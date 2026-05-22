<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\View\Composers\MultiComposer;

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
        // View::share('appName', 'My Laravel Dashboard');

        View::composer('*', function ($view) {

            $view->with('appName', 'My Laravel Dashboard');
        });

        View::composer('partials.sidebar', function ($view) {

            $view->with('notifications', 5);
        });


        // View::composer('dashboard', function ($view) {

        //     $view->with('userCount', 150);
        // });

        // View::composer('profile', function ($view) {
        //     $view->with('profileViews', 999);
        // });

        View::composer(
            ['dashboard', 'profile'],
            function ($view) {
                $view->with([
                    'userCount' => 150,
                    'profileViews' => 999
                ]);
            }
        );
    }
}
