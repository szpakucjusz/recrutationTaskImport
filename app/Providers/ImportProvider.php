<?php
namespace App\Providers;

use App\Repositories\Contracts\CityRepositoryInterface;
use App\Repositories\Contracts\ImportJobOffersInterface;
use App\Repositories\Contracts\JobOfferRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ImportProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImportJobOffersInterface::class, function ($app, $params) {
            return new \App\Services\ImportJobOffersJson(app(JobOfferRepositoryInterface::class), app(CityRepositoryInterface::class));
        });
    }
}
