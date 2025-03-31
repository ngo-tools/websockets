<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Reverb\Contracts\ApplicationProvider;

class ReverbApplicationManagerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(\App\ApplicationManager::class);

        $this->app->bind(
            ApplicationProvider::class,
            fn ($app) => $app->make(\App\ApplicationManager::class)->driver()
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<int, class-string>
     */
    public function provides(): array
    {
        return [\App\ApplicationManager::class, ApplicationProvider::class];
    }
}
