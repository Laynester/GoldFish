<?php
namespace App\Http\Middleware;
use Auth;
use Request;
use Closure;
use App\Helpers\CMS;
class Maintenance
{
  public function handle($request, Closure $next) {
    if(!Request::is(['maintenance','maintenance/login']) && CMS::settings('maintenance') == 1) {
      if(Auth()->User() && Auth()->User()->rank >= CMS::settings('maintenance_rank')) {
        return $next($request);
      }
      return redirect('maintenance');
    } else {
      return $next($request);
    }
  }
}
