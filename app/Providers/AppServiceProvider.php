<?php

namespace App\Providers;

use App\ApplicationManager;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Laravel\Reverb\ApplicationManagerServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->extend(ApplicationManagerServiceProvider::class, function (ApplicationManagerServiceProvider $service, Application $app) {
            return new ApplicationManager($app);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
