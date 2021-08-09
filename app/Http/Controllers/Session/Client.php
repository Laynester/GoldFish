<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class Client extends Controller
{
  public function index()
  {
    $user = auth()->user();
    $user->auth_ticket = 'GoldFish-' . Str::uuid();
    $user->save();
    return view('pages.client');
  }
}
