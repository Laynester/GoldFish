<?php
namespace App\Http\Controllers\Session;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\CMS\Camera_web;
use \Carbon\Carbon;
class Photos extends Controller
{
  public function render()
  {
      $photos = Camera_web::orderBy('timestamp', 'DESC')->paginate(16);
      return view('pages.community.photos',
      [
        'group' => 'community',
        'photos' => $photos
      ]);
  }
}
