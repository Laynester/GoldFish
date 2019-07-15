<?php

namespace App\Http\Middleware;

use Closure;
use Request;
use App\Helpers\CMS;
use DB;

class installer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      try {
        DB::connection()->getPdo();
        if(CMS::settings('installed') == 1) {
          $connection = true;
        }else{$connection = false;}
      } catch (\Exception $e) {
        $connection = false;
      }
      $disabled = array('installer','installer/index','installer/step/2','installer/step/3','installer/step/4','installer/step/5');
      if($connection == false && !Request::is($disabled)) {
        return redirect('installer/index');
      }
      elseif($connection == true && Request::is($disabled)) {
        return redirect('index');
      }
      else{
        return $next($request);
      }
    }
}
