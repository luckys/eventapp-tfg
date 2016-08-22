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
            'EventApp\Domain\Models\Contracts\BaseRepository',
            'EventApp\Repositories\Eloquent\EloquentRepository'
        );

        $this->app->bind(
            'EventApp\Domain\Models\Contracts\UserRepositoryInterface',
            'EventApp\Repositories\Eloquent\UserRepository'
        );

        $this->app->bind(
            'EventApp\Domain\Models\Contracts\EventRepositoryInterface',
            'EventApp\Repositories\Eloquent\EventRepository'
        );
    }
}
