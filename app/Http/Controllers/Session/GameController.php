<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class GameController extends Controller
{
  public function __invoke()
  {
      return view('client', [
          'sso' => auth()->user()->ssoTicket()
      ]);
  }
}
