<?php

namespace App\Http\Middleware;

use Auth;
use Request;
use Closure;
use App\Helpers\CMS;

class Findretros
{
    public function handle($request, Closure $next)
    {
      if(!empty(CMS::settings('findretros'))) {
        if (!$request->exists('novote')) {
          $FindRetros = new \App\Http\FindRetros();
          if (!$FindRetros->hasClientVoted()) {
            $FindRetros->redirectClientToVote();
          }
        }
      }
      return $next($request);
    }
}
