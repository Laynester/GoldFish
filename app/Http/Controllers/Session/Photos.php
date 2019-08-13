<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\CMS\Camera_web;

class Photos extends Controller
{
  public function render()
  {
    $photos = Camera_web::whereHas('habbo')->orderBy('timestamp', 'DESC')->paginate(16);
    return view('pages.community.photos', [
        'group'  => 'community',
        'photos' => $photos
      ]
    );
  }
}
