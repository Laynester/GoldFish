<?php

namespace App\Http\Middleware;

use App\Models\CMS\Settings;
use Closure;
use Illuminate\Support\Facades\Schema;
use Request;
use App\Helpers\CMS;
use DB;

class InstallationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(\Illuminate\Http\Request $request, Closure $next)
    {
        $isInstalled = false;

        $installationUrls = array(
            'installation',
            'installation/index',
            'installation/step/2',
            'installation/step/3',
            'installation/step/4',
            'installation/step/5',
            'installation/step/6'
        );

        if (!Schema::hasTable('cms_settings') && !Request::is('installation/index')) {
            return redirect()->route('installation.index');
        }

        if ((Schema::hasTable('cms_settings') && Schema::hasTable('cms_homes_catalogue')) && Request::is('installation/index')) {
            return redirect()->route('installation.step', 2);
        }

        if (Schema::hasTable('cms_settings') && CMS::settings('installed') == 1) {
            $isInstalled = true;
        }

        if ((!$isInstalled && !Request::is($installationUrls)) && (Schema::hasTable('cms_settings') && Settings::where('key', 'installed')->first()->value == 0)) {
            return redirect()->route('installation.step', 2);
        }

        if ($isInstalled && Request::is($installationUrls)) {
            return redirect('index');
        }

        return $next($request);
    }
}
