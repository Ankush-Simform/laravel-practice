<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\LoggerServices;

class LoggerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->scoped(LoggerServices::class, function(){
                return new LoggerServices;
        });
    }

    /**
     * Bootstrap services.         
     */ 
    public function boot(): void
    {
        //
    }
}
