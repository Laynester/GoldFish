<?php
namespace App\Http\Controllers\Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Models\CMS\Camera_web;
use App\Models\Hotel\GroupMembership;

class Home extends Controller
{
  public function showProfile($username)
  {
    $user = User::where('username', $username)->first();
    if(empty($user))
    {
      return redirect()->back();
    }
    $badges = \App\Models\User\User_Badges::where('user_id', $user->id)->take(50)->inRandomOrder()->get();
    $rooms = \App\Models\Hotel\Room::where('owner_id', $user->id)->take(10)->inRandomOrder()->get();
    $friend_data = \App\Models\Hotel\Friendship::whereHas('habbo')->where('user_one_id', $user->id)->take(12)->inRandomOrder()->get();
    $photos = Camera_web::where('user_id', $user->id)->take(12)->inRandomOrder()->get();
    $groups = GroupMembership::where('user_id', $user->id)->whereHas('guild')->take(12)->inRandomOrder()->get();
    return view('pages.me.home',[
      'user' => $user,
      'badges' => $badges,
      'rooms' => $rooms,
      'friends' => $friend_data,
      'photos' => $photos,
      'groups' => $groups,
      'group' => 'me'
    ]);
  }

}
