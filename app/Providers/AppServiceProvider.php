<?php

namespace App\Providers;

use App\Events\RoleChanged;
use App\Listeners\LogRoleChange;
use App\Models\User;
use App\Observers\UserObserver;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\Facades\Event;
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
        Event::listen(
            LogRoleChange::class
        );

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
