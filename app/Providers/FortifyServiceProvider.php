<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Helpers\CMS;
use App\Models\CMS\News;
use App\Models\User\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);

        RateLimiter::for('login', function (Request $request) {
            $username = (string) $request->username;

            return Limit::perMinute(5)->by($username.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // Load login view
        $this->loginView();

        // Attempt to authenticate user
        $this->authenticateUser();
    }

    private function loginView()
    {
        if (Schema::hasTable('cms_news')) {
            $news = News::query()
                ->latest('date')
                ->take(3)
                ->get();
        }

        Fortify::loginView( function() use ($news){
            return view('auth.login', [
                'group' => 'home',
                'news' => $news ?? null,
            ]);
        });
    }

    private function authenticateUser()
    {
        Fortify::authenticateUsing(function(Request $request){
            $request->validate([
                Fortify::username() => ['required', 'string'],
                'password' => ['required', 'string'],
            ]);

            $username = $request->input('username');
            $user = User::query()->where('username', $username)->first();

            if (!User::where('username', '=', $username)->exists()) {
                throw ValidationException::withMessages([
                    'username' => [__('We did not find an account matching those credentials.')],
                ]);
            }

            if (CMS::settings('maintenance') === '1' && (!is_null($user) && $user->rank < CMS::settings('maintenance_rank'))) {
                throw ValidationException::withMessages([
                    'username' => [__('You can not login while the hotel is in maintenance.')],
                ]);
            }

            if($user && Hash::check($request->input('password'), $user->password)){
                $this->updateAuthenticatedUser($user);

                return $user;
            }
        });
    }

    private function updateAuthenticatedUser($user)
    {
        $currentTime = time();
        $ipAddress = request()->ip();

        // Update the user
        $user->update([
            'last_login' => $currentTime,
            'ip_current' => $ipAddress,
        ]);

        // Add an entry to the cms_logins table
        $user->logins()->create([
            'ip' => $ipAddress,
            'timestamp' => $currentTime,
            'successful' => 1
        ]);
    }
}
