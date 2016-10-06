<?php

namespace EventApp\Events;

use EventApp\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EventWasPurchased extends Event
{
    use SerializesModels;

    public $user;

    /**
     * Create a new event instance.
     *
     * @param array $user
     */
    public function __construct(array $user)
    {
        $this->user = $user;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
