<?php
namespace App\Http\Controllers\Session;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Models\User\User_currency;

class Leaderboards extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function render()
  {
      $coins = User::where('rank', '<', 3)->orderBy('credits','desc')->take(5)->get();
      $diamonds = User_Currency::whereHas('habbo', function($q) {$q->where('rank', '<', '3');})->where('type', 5)->take(5)->orderBy('amount', 'desc')->get();
      $duckets = User_Currency::whereHas('habbo', function($q) {$q->where('rank', '<', '3');})->where('type', 0)->take(5)->orderBy('amount', 'desc')->get();
      return view('pages.community.leaderboards',
      [
        'group' => 'community',
        'coins' => $coins,
        'diamonds' => $diamonds,
        'duckets' => $duckets
      ]);
  }
}
