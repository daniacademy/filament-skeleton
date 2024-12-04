<?php

namespace App\Providers;

use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

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
        Password::defaults(function () {
            return Password::min(8)
                ->mixedCase()
                ->symbols()
                ->uncompromised();
        });

        FilamentAsset::register([
            Css::make('global-style', asset('css/global.css')),
        ]);
        FilamentAsset::register([
            Js::make('global-script', asset('js/global.js')),
        ]);
    }
}
