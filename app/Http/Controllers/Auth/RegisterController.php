<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Helpers\CMS;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected string $redirectTo = self::REDIRECT_HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'username' => ['required', 'max:255', 'unique:users', 'alpha_dash'],
            'mail' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $currentTime = time();
        $ipAddress = request()->ip();

        $user = User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => Hash::make($data['password']),
            'ip_register' => $ipAddress,
            'ip_current' => $ipAddress,
            'last_login' => $currentTime,
            'account_created' => $currentTime,
            'motto' => CMS::settings('default_motto'),
            'credits' => CMS::settings('reg_credits'),
        ]);

        $regCurrency = [
            ['type' => 0, 'amount' => CMS::settings('reg_duckets')],
            ['type' => 5, 'amount' => CMS::settings('reg_diamonds')],
            ['type' => 101, 'amount' => CMS::settings('reg_points')],
        ];

        foreach ($regCurrency as $currency) {
            $user->currencies()->create($currency);
        }

        return $user;
    }

    public static function showRegistrationForm()
    {
        return view('auth.register', [
            'group' => 'register',
        ]);
    }
}
