<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\CMS;
use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\CMS\News;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected string $redirectTo = self::REDIRECT_HOME;

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $user = User::query()
            ->where('username', '=', $request->input('username'))
            ->first();

        if (CMS::settings('maintenance') === '1' && (!is_null($user) && $user->rank < CMS::settings('maintenance_rank'))) {
            return redirect()->back()->withErrors(__('You can not login while the hotel is in maintenance.'));
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function authenticated()
    {
        $user = auth()->user();
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

    public static function showLoginForm()
    {
        $news = News::query()
            ->latest('date')
            ->take(9)
            ->get();

        return view('auth.login', [
            'group' => 'home',
            'news' => $news
        ]);
    }

    public function username()
    {
        return 'username';
    }
}
