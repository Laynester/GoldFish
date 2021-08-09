<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\User\User;

class Staff extends Controller
{
  public function index()
  {
    $users = User::where('rank', '>', 3)->get();
    return view('pages.community.staff', [
        'group' => 'community',
        'staff' => $users
      ]
    );
  }
}
