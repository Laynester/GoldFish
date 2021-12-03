<?php
namespace App\Http\Middleware;

use Closure;
use App\Helpers\CMS;
use Illuminate\Support\Facades\Request;

class Maintenance
{
  public function handle($request, Closure $next)
  {
      if ((auth()->check() && auth()->user()->rank >= CMS::settings('maintenance_rank')) && (CMS::settings('maintenance') && !Request::is('maintenance'))) {
          return $next($request);
      }

      if (!Request::is('maintenance') && CMS::settings('maintenance')) {
          return redirect()->route('maintenance.index');
      }

      if (Request::is('maintenance') && !CMS::settings('maintenance')) {
          return redirect()->route('login.index');
      }
      
      return $next($request);
  }
}
