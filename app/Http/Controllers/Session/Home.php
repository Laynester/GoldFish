<?php
namespace App\Http\Controllers\Session;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\CMS\News;

class Home extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function render()
  {
      $badges = \App\Models\User\User_Badges::where('user_id', Auth()->User()->id)->get();
          $news = News::orderBy('date', 'DESC')->take(3)->get();
      return view('pages.home',
      [
        'badges' => $badges,
        'news' => $news,
        'currency' => Auth::user()->currency
      ]);
  }
}
