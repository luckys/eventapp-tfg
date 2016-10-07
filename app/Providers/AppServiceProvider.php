<?php

namespace EventApp\Providers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
        Validator::extend('actual_password', function ($attribute, $value, $parameters) {
            return Hash::check($value, auth()->user()->password);
        });
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

        $this->app->bind(
            'EventApp\Domain\Models\Contracts\TalkRepositoryInterface',
            'EventApp\Repositories\Eloquent\TalkRepository'
        );
    }
}
