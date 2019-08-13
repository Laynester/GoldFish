<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class Client extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function render()
  {
    $user = auth()->user();
    $user->auth_ticket = 'GoldFish-' . Str::uuid();
    $user->save();
    return view('pages.client');
  }
}
