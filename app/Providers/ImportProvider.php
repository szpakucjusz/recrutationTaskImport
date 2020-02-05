<?php
namespace App\Providers;

use App\Repositories\Contracts\ImportJobOffersInterface;
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
            return new \App\Services\ImportJobOffersJson;
        });
    }
}
