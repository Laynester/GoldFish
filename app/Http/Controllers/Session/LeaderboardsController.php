<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Models\User\UserCurrency;
use App\Models\User\User_Setting;
use App\Models\User\Achievements;

class LeaderboardsController extends Controller
{
  public function __invoke()
  {
    $coins       = User::where('rank', '<', 3)->orderBy('credits', 'desc')->take(5)->get();
    $diamonds    = UserCurrency::whereHas('habbo', function ($q) {$q->where('rank', '<', '3');})->where('type', 5)->take(5)->orderBy('amount', 'desc')->get();
    $duckets     = UserCurrency::whereHas('habbo', function ($q) {$q->where('rank', '<', '3');})->where('type', 0)->take(5)->orderBy('amount', 'desc')->get();
    $respects    = User_Setting::whereHas('habbo', function ($q) {$q->where('rank', '<', '3');})->take(5)->orderBy('respects_received', 'DESC')->get();
    $achievement = User_Setting::whereHas('habbo', function ($q) {$q->where('rank', '<', '3');})->take(5)->orderBy('achievement_score', 'DESC')->get();
    $time        = Achievements::whereHas('habbo')->where('achievement_name','AllTimeHotelPresence')->take(5)->orderBy('progress', 'DESC')->get();
    return view('pages.community.leaderboards', [
        'group'           => 'community',
        'coins'           => $coins,
        'diamonds'        => $diamonds,
        'duckets'         => $duckets,
        'respects_gained' => $respects,
        'achievement'     => $achievement,
        'time'            => $time
      ]
    );
  }
}
