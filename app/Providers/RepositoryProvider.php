<?php

namespace WideProject\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \WideProject\Repositories\ClientRepository::class,
            \WideProject\Repositories\ClientRepositoryEloquent::class
        );
    }
}