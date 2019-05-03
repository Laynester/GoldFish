<?php
namespace App\Http\Controllers\Session;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\CMS\News;
use App\Models\User\User;

class Community extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function render()
  {
      $news = News::orderBy('date', 'DESC')->take(5)->get();
      $users = User::inRandomOrder()->take(10)->get();
      return view('pages.community',
      [
        'news' => $news,
        'group' => 'community',
        'users' => $users
      ]);
  }
}
