<?php

namespace EventApp\Listeners;

use EventApp\Events\TalkWasPurchased;
use Illuminate\Support\Facades\Mail;

class EmailTicketTalkPurchase
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
     * @param  TalkWasPurchased  $event
     * @return void
     */
    public function handle(TalkWasPurchased $event)
    {
        $user = $event->user;

        Mail::send('admin.emails.talk-purchased', ['user' => $user], function ($m) use ($user) {
            $m->from('webmaster@eventapp.com', 'EventApp');
            $m->to($user['email'], $user['name'])
                ->subject('Compra de entrada para la charla');
        });
    }
}
