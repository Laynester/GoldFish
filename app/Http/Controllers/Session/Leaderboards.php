<?php
namespace App\Http\Controllers\Session;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\User\User;

class Leaderboards extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function render()
  {
      return view('pages.leaderboards',
      [
        'group' => 'community'
      ]);
  }
}
