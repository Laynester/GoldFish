<?php
namespace App\Http\Controllers\Session;

use Auth;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;
use Illuminate\Http\Request;

class API extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function return(Request $request)
  {
    return [
      'hotel' => [
        'online' => CMS::online()
      ],
      'user' => [
        'username' => Auth()->User()->username
      ]
      ];
  }
}
