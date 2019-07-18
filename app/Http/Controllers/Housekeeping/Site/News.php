<?php
namespace App\Http\Controllers\Housekeeping\Site;

use Auth;
use Request;
use Illuminate\Http\Request as Req;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\CMS\News as Insert;
use Validate;

class News extends Controller
{
  public function Create(Req $request)
  {
    if(CMS::fuseRights('site_news')){
      if (Request::isMethod('post'))
      {
        $validatedData = $request->validate([
          'title'   => 'required',
          'short' => 'required',
          'long' => 'required',
          'image' => 'required'
        ]);
        Insert::create([
          'caption' => request()->get('title'),
          'desc' => request()->get('short'),
          'body' => request()->get('long'),
          'image' => '/images/news/'.request()->get('image'),
          'author' => auth()->user()->id,
          'date' => time()
        ]);
        return redirect('housekeeping/site/news/list')->withErrors(['Created '.request()->get('title')]);
      }
      $images = \File::allFiles(public_path('images/news'));
      return view('site.createnews',
      [
        'group' => 'site',
        'images' => $images
      ]);
    }
    else {
      return redirect('housekeeping/dashboard');
    }
  }
  public function List()
  {
    if(CMS::fuseRights('site_news')){
      $news = Insert::orderBy('date', 'DESC')->paginate(10);
      return view('site.newslist',
      [
        'group' => 'site',
        'news' => $news,
      ]);
    }
    else {
      return redirect('housekeeping/dashboard');
    }
  }
  public function Edit($id)
  {
    if(CMS::fuseRights('site_news')){
      $news = Insert::where('id', $id)->first();
      if(!empty($news)) {
        if (Request::isMethod('post'))
        {
          $image = '/images/news/'.request()->get('image');
          if(request()->get('image') == $news->image) {
            $image = $news->image;
          }
          Insert::where('id', $id)->update([
            'caption' => request()->get('title'),
            'desc' => request()->get('short'),
            'image' => $image,
            'body' => request()->get('long'),
            'date' => time(),
          ]);
          return redirect('housekeeping/site/news/list')->withErrors(['Saved changes.']);
        }
        $images = \File::allFiles(public_path('images/news'));
        return view('site.editnews',
        [
          'group' => 'site',
          'news' => $news,
          'images' => $images
        ]);
      }
    }
    else {
      return redirect('housekeeping/dashboard');
    }
  }
  public function Delete($id)
  {
    if(CMS::fuseRights('site_news')){
      Insert::where('id', $id)->delete();
      return redirect()->back()->withErrors(['Deleted']);
    }
  }
}
