<?php

namespace App\Providers;

use App\Repositories\ChirpRepository;
use App\Repositories\ChirpRepositoryContract;
use App\Services\ChirpService;
use App\Services\ChirpServiceContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ChirpRepositoryContract::class, ChirpRepository::class);
        $this->app->bind(ChirpServiceContract::class, ChirpService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
