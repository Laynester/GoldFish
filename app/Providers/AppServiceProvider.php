<?php

namespace App\Providers;

use App\Models\CMS\Settings;
use App\Models\CMS\News;
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
        // get hotelname
        $hotelname = Settings::where('key', 'hotelname')->first();
        // get GoldFish version
        $version = Settings::where('key', 'version')->first();
        // site alert enabled check
        $enabled = Settings::where('key', 'site_alert_enabled')->first();
        // site alert
        $alert= Settings::where('key', 'site_alert')->first();
        $sa_badge= Settings::where('key', 'site_alert_badge')->first();
        $c_images= Settings::where('key', 'c_images')->first();

        $data = array(
            'hotelname' => $hotelname->value,
            'gfv' => $version->value,
            'sae' => $enabled->value,
            'sa' => $alert->value,
            'sa_badge' => $sa_badge->value,
            'c_images' => $c_images->value
          );
          View::share('data', $data);

        // set news coposer
        view()->composer('components.news', function () {
            $news = News::orderBy('date', 'DESC')->take(6)->get();
            View::share('news', $news);
        });
    }
}
