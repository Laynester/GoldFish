<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class LocalizationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Cookie::has('locale')) {
            App::setLocale($request->cookie('locale'));
        }

        return $next($request);
    }
}