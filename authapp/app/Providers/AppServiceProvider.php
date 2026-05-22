<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SimpleLogger;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('simplelogger', function () {
            return new SimpleLogger();
        });
    }

    public function boot(): void
    {
        //  
        }
    }