<?php
namespace App\Http\Controllers\Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\User;

class Home extends Controller
{
  public function showProfile($username)
  {
    $user = User::where('username', $username)->first();
    if(empty($user))
    {
      return redirect()->back();
    }
    $badges = \App\Models\User\User_Badges::where('user_id', $user->id)->take(16)->inRandomOrder()->get();
    return view('pages.me.home',[
      'user' => $user,
      'badges' => $badges,
      'group' => 'me'
    ]);
  }

}
