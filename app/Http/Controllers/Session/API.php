<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use Illuminate\Http\Request;

class API extends Controller
{
  public function return(Request $request)
  {
    return [
      'hotel' => [
        'online' => CMS::online()
      ]
    ];
  }
}
