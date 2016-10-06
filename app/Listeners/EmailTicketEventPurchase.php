<?php

namespace EventApp\Listeners;

use EventApp\Events\EventWasPurchased;
use Illuminate\Support\Facades\Mail;

class EmailTicketEventPurchase
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TicketWasGenerated  $event
     * @return void
     */
    public function handle(EventWasPurchased $event)
    {
        $user = $event->user;

        Mail::send('admin.emails.event-purchased', ['user' => $user], function ($m) use ($user) {
            $m->from('webmaster@eventapp.com', 'EventApp');
            $m->to($user['email'], $user['name'])
                ->subject('Compra de entrada para el evento');
        });
    }
}
