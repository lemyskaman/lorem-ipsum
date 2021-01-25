<?php

namespace Lemyskaman\LorempIpsum\Providers;


use Illuminate\Support\ServiceProvider;
use Lemyskaman\LorempIpsum\LorempIpsum;

class LorempIpsumServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(LorempIpsum::class,LorempIpsum::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}