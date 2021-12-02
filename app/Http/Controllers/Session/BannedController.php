<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\User\Bans;

class BannedController extends Controller
{
    public function index()
    {
        $ban = Bans::where('user_id', Auth()->User()->id)->orWhere('ip', Auth()->User()->ip_current)->orderBy('id', 'desc')->first();
        return view('banned', [
            'group' => 'home',
            'ban'   => $ban
          ]
        );
    }
}
