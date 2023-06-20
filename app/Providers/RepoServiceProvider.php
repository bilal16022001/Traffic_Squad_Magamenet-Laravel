<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Interface\PoliceStationInterface', 'App\Repository\PoliceStationRepository');
        $this->app->bind('App\Interface\TrafficPoliceInterface', 'App\Repository\TrafficPoliceRepository');
        $this->app->bind('App\Interface\OffensesInterface', 'App\Repository\OffensesRepository');
        $this->app->bind('App\Interface\ReportsOffenseInterface', 'App\Repository\ReportsOffenseRepository');
        $this->app->bind('App\Interface\SearchOffenseInterface', 'App\Repository\SearchOffenseRepository');
        $this->app->bind('App\Interface\TrafficStationInterface', 'App\Repository\TrafficStationRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
