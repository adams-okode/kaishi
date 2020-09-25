<?php

namespace App\Providers;

use App\FormFields\SiteRegisterFormField;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;
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

        if (env('APP_ENV') == 'prod' || env('APP_ENV') == 'production') {
            $this->app['request']->server->set('HTTPS', true);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        if (env('APP_ENV') == 'prod' || env('APP_ENV') == 'production') {
            $url->formatScheme('https');
        }
    }
}
