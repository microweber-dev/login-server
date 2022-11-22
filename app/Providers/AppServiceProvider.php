<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $locale = Crypt::decryptString(Cookie::get('site_lang'));
        $localeExp = explode('|', $locale);

        if (isset($localeExp[1])) {
            \App::setLocale($localeExp[1]);
        }
        
        Schema::defaultStringLength(191);
    }
}
