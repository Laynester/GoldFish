<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\CMS\CameraWeb;

class PhotosController extends Controller
{
  public function __invoke()
  {
    $photos = CameraWeb::query()
        ->whereHas('habbo')
        ->latest('timestamp')
        ->paginate(16);

    return view('community.photos', [
        'group'  => 'community',
        'photos' => $photos
      ]
    );
  }
}
