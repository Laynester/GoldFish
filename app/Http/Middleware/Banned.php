<?php

namespace App\Http\Middleware;

use Auth;
use Carbon\Carbon;
use Request;
use Closure;
use App\Models\User\Bans;

class Banned
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return $next($request);
        }

        $isBanned = Bans::query()
            ->where('user_id', '=', auth()->id())
            ->orWhere('ip', '=', auth()->user()->ip_current)
            ->where('ban_expire', '>=', Carbon::now()->timestamp)
            ->first();

        if (!Request::is(['banned', 'logout']) && $isBanned) {
            return redirect('banned');
        }

        return $next($request);
    }
}
