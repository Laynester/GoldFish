<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\CMS\News;

class LoginController extends Controller
{
  use AuthenticatesUsers;

  protected $redirectTo = '/me';

  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  protected function authenticated()
  {
    $user = auth()->user();
    $user->last_login = time();
    $user->ip_current = request()->ip();
    $user->save();
    \App\Models\CMS\Login::create([
      'user_id'    => auth()->user()->id,
      'ip'         => request()->ip(),
      'timestamp'  => time(),
      'successful' => '1'
    ]);
  }

  public static function showLoginForm()
  {
    $news = News::orderBy('date', 'DESC')->take(9)->get();
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
