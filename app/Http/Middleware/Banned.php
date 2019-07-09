<?php
namespace App\Http\Middleware;
use Auth;
use Request;
use Closure;
use App\Models\User\Bans;
class Banned
{
  public function handle($request, Closure $next) {
    if (!empty(Auth()->User()->id)){
      $ban = Bans::where('user_id', Auth()->User()->id)->orWhere('ip', Auth()->User()->ip_current)->orderBy('id','desc')->first();
      if(Request::is(['banned']) && empty($ban)) {
        return redirect('me');
      }
      if(empty($ban) || $ban->ban_expire <= time()){
        if(Request::is(['banned'])){
          return redirect('me');
        }
          return $next($request);
      }
      if(!Request::is(['banned', 'logout'])){
        return redirect('banned');
      } else {
        return $next($request);
      }
    }
    else {
      return $next($request);
    }
  }
}
