<?php
namespace App\Http\Controllers\Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\User;

class Home extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function showProfile($username)
  {
    $user = User::where('username', $username)->first();
    if(empty($user))
    {
      return redirect()->back();
    }
    $badges = \App\Models\User\User_Badges::where('user_id', $user->id)->take(50)->inRandomOrder()->get();
    return view('pages.home',[
      'user' => $user,
      'badges' => $badges,
      'group' => 'me'
    ]);
  }

}
