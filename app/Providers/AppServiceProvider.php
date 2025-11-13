<?php

namespace App\Providers;

use App\Models\Alimentacion;
use App\Models\Alimento;
use App\Observers\AlimentacionObserver;
use App\Observers\AlimentoObserver;
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
        Alimento::observe(AlimentoObserver::class);
    }
}
