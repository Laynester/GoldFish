<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\User\Bans;

class BannedController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $ban = Bans::query()
            ->where('user_id', $user->id)
            ->orWhere('ip', $user->ip_current)
            ->latest('id')
            ->first();

        return view('banned', [
            'group' => 'home',
            'ban'   => $ban
          ]
        );
    }
}
