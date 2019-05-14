<?php
namespace App\Http\Controllers\Session;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\CMS\News;
use App\Models\User\User;

class Community extends Controller
{
  public function render()
  {
      $news = News::orderBy('date', 'DESC')->take(5)->get();
      $users = User::inRandomOrder()->take(16)->get();
      return view('pages.community.community',
      [
        'news' => $news,
        'group' => 'community',
        'users' => $users
      ]);
  }
}
