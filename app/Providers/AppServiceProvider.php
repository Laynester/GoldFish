<?php

namespace App\Providers;

use App\Models\CMS\Settings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $hotelname = Settings::where('key', 'hotelname')->first();
        View::share('hotelname', $hotelname->value);
        $version = Settings::where('key', 'version')->first();
        View::share('gfv', $version->value);
    }
}
