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
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            DB::connection()->getPdo();
            if (CMS::settings('installed') == 1) {
                $connection = true;
            } else {
                $connection = false;
            }
        } catch (\Exception $e) {
            $connection = false;
        }

        $disabled = array('installer', 'installation/index', 'installation/step/2', 'installation/step/3', 'installation/step/4', 'installation/step/5', 'installation/step/6');

        if ($connection == false && !Request::is($disabled)) {
            return redirect('installation/index');
        }
        elseif ($connection == true && Request::is($disabled)) {
            return redirect('index');
        }
        else {
            return $next($request);
        }
    }
}
