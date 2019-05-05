<?php
namespace App\Http\Controllers\Session;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\User\User;

class Staff extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function render()
  {
      $users = User::where('rank', '>', 3)->get();
      return view('pages.staff',
      [
        'group' => 'community',
        'staff' => $users
      ]);
  }
}
