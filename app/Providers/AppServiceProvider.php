<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\FormFields\SiteRegisterFormField;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Voyager::addFormField(SiteRegisterFormField::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // if (env('APP_ENV') == 'prod' || env('APP_ENV') == 'production') {
        //     \URL::forceScheme('https');
        // }
    }
}
