<?php
namespace App\Http\Controllers\Session;

use Auth;
use App\Http\Controllers\Controller;
use App\Helpers\CMS;

class API extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function return()
  {
    $arr = array(
           "hotel" => array(
                      "online" => CMS::online()
                    ),
           "user" => array(
                     "username" => Auth()->User()->username
                    ),
                );
    $myJSON = json_encode($arr);
    return response($myJSON, 200)->header('Content-Type', 'application/json');;
  }
}
