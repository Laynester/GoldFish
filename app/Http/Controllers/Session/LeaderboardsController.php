<?php

namespace App\Http\Controllers\Session;

use App\Helpers\CMS;
use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Models\User\UserCurrency;
use App\Models\User\User_Setting;
use App\Models\User\Achievements;

class LeaderboardsController extends Controller
{
    public function __invoke()
    {
        $credits = User::where('rank', '<', 3)->orderBy('credits', 'desc')->take(5)->get();
        $duckets = CMS::leaderboardCurrencyType(0);
        $diamonds = CMS::leaderboardCurrencyType(5);
        $respects = CMS::leaderboardUserSettings('respects_received');
        $achievement = CMS::leaderboardUserSettings('achievement_score');
        $time = Achievements::query()
            ->whereHas('habbo')
            ->where('achievement_name', '=', 'AllTimeHotelPresence')
            ->take(5)
            ->orderByDesc('progress')
            ->get();

        return view('community.leaderboards', [
                'group' => 'community',
                'credits' => $credits,
                'diamonds' => $diamonds,
                'duckets' => $duckets,
                'respects' => $respects,
                'achievement' => $achievement,
                'time' => $time
            ]
        );
    }
}
