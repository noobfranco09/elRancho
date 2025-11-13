<?php

namespace App\Providers;

use App\Models\Alimentacion;
use App\Observers\AlimentacionObserver;
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
        Alimentacion::observe(AlimentacionObserver::class);
    }
}
