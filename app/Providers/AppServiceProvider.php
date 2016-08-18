<?php

namespace EventApp\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'EventApp\Domain\Models\Repositories\UserRepositoryInterface',
            'EventApp\Repositories\Eloquent\UserRepository'
        );
    }
}
