<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\User\User;

class StaffController extends Controller
{
  public function __invoke()
  {
    $users = User::where('rank', '>', 3)->get();
    return view('pages.community.staff', [
        'group' => 'community',
        'staff' => $users
      ]
    );
  }
}
