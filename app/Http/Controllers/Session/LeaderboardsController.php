<?php

namespace App\Http\Controllers\Session;

use App\Helpers\CMS;
use App\Models\User\User;
use App\Models\User\Achievements;
use App\Http\Controllers\Controller;

class LeaderboardsController extends Controller
{
    public function __invoke()
    {
        $credits = User::query()
            ->where('rank', '<', CMS::settings('min_staff_rank'))
            ->orderByDesc('credits')
            ->take(5)
            ->get();

        $time = Achievements::query()
            ->whereHas('habbo')
            ->where('achievement_name', '=', 'AllTimeHotelPresence')
            ->take(5)
            ->latest('progress')
            ->get();

        $duckets = CMS::leaderboardCurrencyType(0);
        $diamonds = CMS::leaderboardCurrencyType(5);
        $respects = CMS::leaderboardUserSettings('respects_received');
        $achievement = CMS::leaderboardUserSettings('achievement_score');

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
