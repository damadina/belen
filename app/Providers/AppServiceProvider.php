<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\ttrabajo;
use App\Models\ttarea;
use App\Observers\ttrabajoObserver;

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
        ttrabajo::observe(ttrabajoObserver::class);
    }
}
