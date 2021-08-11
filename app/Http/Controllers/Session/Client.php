<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class Client extends Controller
{
  public function index()
  {
      $sso = auth()->user()->ssoTicket();

      return view('pages.client', [
          'sso' => $sso
      ]);
  }
}
