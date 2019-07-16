<?php
namespace App\Http\Middleware;

use Request;
use Closure;
use App\Helpers\CMS;

class changeTheme
{
  public function handle($request, Closure $next) {
    \Theme::set(CMS::settings('theme'));
    return $next($request);
  }
}
