<?php
namespace App\Providers;

use App\Repositories\Contracts\CityRepositoryInterface;
use App\Repositories\Contracts\JobOfferRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(JobOfferRepositoryInterface::class, function ($app, $params) {
            return new \App\Repositories\JobOfferRepository();
        });
        $this->app->bind(CityRepositoryInterface::class, function ($app, $params) {
            return new \App\Repositories\CityRepository();
        });
    }
}
