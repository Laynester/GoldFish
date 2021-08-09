<?php

namespace App\Http\Controllers\Session;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\CMS\News;
use App\Models\Hotel\Friendship;

class Me extends Controller
{
  public function index()
  {
    $badges = \App\Models\User\User_Badges::where('user_id', Auth()->User()->id)->take(32)->get();
    $news = News::orderBy('date', 'DESC')->take(3)->get();
    $friends = Friendship::where('user_one_id', Auth()->User()->id)->inRandomOrder()->take(5)->get();
    $friendOnlineCount = Friendship::whereHas('habbo', function ($query){
      $query->where('online','1');
    })->where('user_one_id',Auth()->User()->id)->get();
    return view('pages.me.me', [
        'badges'   => $badges,
        'news'     => $news,
        'currency' => Auth::user()->currency,
        'group'    => 'me',
        'friends'  => $friends,
        'fron' => $friendOnlineCount,
      ]
    );
  }
  public function destroy($id)
  {
    \App\Models\CMS\Alerts::where('userid', Auth()->User()->id)->orWhere('id', $id)->delete();
    return redirect()->back();
  }
  public function search()
  {
    $user = \App\Models\User\User::where('username', request()->get('search'))->first();
    if($user) {
      return redirect('/home/'.request()->get('search'));
    } else {
      return redirect()->back()->withErrors('User not Found.');
    }
  }
}
