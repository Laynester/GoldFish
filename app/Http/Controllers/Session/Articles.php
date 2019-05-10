<?php
namespace App\Http\Controllers\Session;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\CMS\News;
use App\Models\User\User;

class Articles extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function render()
  {
      $news = News::orderBy('date', 'DESC')->paginate(5);
      return view('pages.community.articles',
      [
        'group' => 'community',
        'news' => $news
      ]);
  }
  public function renderNews($id)
  {
    if(empty($id))
    {
      return redirect()->back();
    }
    $news = News::where('id', $id)->get();
    if(empty($news))
    {
      return redirect()->back();
    }
    return view('pages.community.article',
    [
      'group' => 'community',
      'news' => $news
    ]);
  }
}
