<?php

namespace EventApp\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'EventApp\Events\EventWasPurchased' => [
            'EventApp\Listeners\EmailTicketEventPurchase'
        ],
        'EventApp\Events\TalkWasPurchased' => [
            'EventApp\Listeners\EmailTicketTalkPurchase'
        ],
    ];

    /**
     * Register any other event for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
