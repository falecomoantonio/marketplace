<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OfferRepository::class, \App\Repositories\OfferRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ContactUsRepository::class, \App\Repositories\ContactUsRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NewsletterRepository::class, \App\Repositories\NewsletterRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\StoreRepository::class, \App\Repositories\StoreRepositoryEloquent::class);
        //:end-bindings:
    }
}
