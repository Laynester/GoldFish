<?php
namespace App\Http\Controllers\Housekeeping;

use Auth;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;

class News extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('setTheme:Admin');
  }
  public function render()
  {
    if(auth()->user()->rank >= CMS::fuseRights('news')){
      $images = \File::allFiles(public_path('images/news'));
      return view('news',
      [
        'group' => 'site',
        'images' => $images
      ]);
    }
    else {
      return redirect('me');
    }
  }
}
