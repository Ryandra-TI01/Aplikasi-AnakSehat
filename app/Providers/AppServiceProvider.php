<?php

namespace App\Providers;

use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['en','id']) // also accepts a closure
                ->circular()
                ->visible(insidePanels: true)
                ->flags([
                    'en' => asset('flags/USA-flag.png'),
                    'id' => asset('flags/INDONESIA-flag.png'),
                ]);
        });
    }
}
