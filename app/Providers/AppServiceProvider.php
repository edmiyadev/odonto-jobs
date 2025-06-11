<?php

namespace App\Providers;

use App\Interfaces\LocationRepositoryInterface;
use App\Interfaces\TypeEmploymentRepositoryInterface;
use App\Interfaces\VacancyRepositoryInterface;
use App\Repositories\LocationRepository;
use App\Repositories\TypeEmploymentRepository;
use App\Repositories\VacancyRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
        $this->app->bind(TypeEmploymentRepositoryInterface::class, TypeEmploymentRepository::class);
        $this->app->bind(VacancyRepositoryInterface::class, VacancyRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
