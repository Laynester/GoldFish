<?php
namespace App\Http\Controllers\Housekeeping;

use Auth;
use Request;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use App\Models\CMS\News as Insert;

class News extends Controller
{
  public function render()
  {
    if(auth()->user()->rank >= CMS::fuseRights('news')){
      if (Request::isMethod('post'))
      {
        if(empty(request()->get('title'))) {
          Insert::create([
            'caption' => request()->get('title'),
            'desc' => request()->get('short'),
            'body' => request()->get('long'),
            'image' => '/images/news/'.request()->get('image'),
            'author' => auth()->user()->id,
            'date' => time()
          ]);
      }
      }
      $images = \File::allFiles(public_path('images/news'));
      return view('news',
      [
        'group' => 'site',
        'images' => $images
      ]);
    }
    else {
      return redirect('dashboard');
    }
  }
}
