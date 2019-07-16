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
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/me';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      return Validator::make($data, [
          'username' => 'required|max:255|unique:users|alpha_dash',
          'mail' => 'required|email|max:255|unique:users',
          'password' => 'required|min:6|confirmed',
      ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => Hash::make($data['password']),
            'ip_register' => request()->ip(),
            'ip_current' => request()->ip(),
            'last_login' => time(),
            'account_created' => time(),
            'motto' => CMS::settings('default_motto')
        ]);
    }
    public static function showRegistrationForm() {
      return view('auth.register',[
        'group' => 'register',
      ]);
    }
}
