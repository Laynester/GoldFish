<?php

namespace App\Http\Controllers\Session;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\CMS\News;

class Me extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function render()
  {
    $badges = \App\Models\User\User_Badges::where('user_id', Auth()->User()->id)->take(32)->get();
    $news = News::orderBy('date', 'DESC')->take(3)->get();
    $friends = \App\Models\Hotel\Friendship::where('user_one_id', Auth()->User()->id)->inRandomOrder()->take(5)->get();
    return view('pages.me.me', [
        'badges'   => $badges,
        'news'     => $news,
        'currency' => Auth::user()->currency,
        'group'    => 'me',
        'friends'  => $friends
      ]
    );
  }
  public function delete($id)
  {
    \App\Models\CMS\Alerts::where('userid', Auth()->User()->id)->orWhere('id', $id)->delete();
    return redirect()->back();
  }
}
