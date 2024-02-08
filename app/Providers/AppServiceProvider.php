<?php

namespace App\Providers;

use App\Repositories\TroliData\TroliDataRepository;
use App\Repositories\TroliData\TroliDataRepositoryImplements;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TroliDataRepository::class, TroliDataRepositoryImplements::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
