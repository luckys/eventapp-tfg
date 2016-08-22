<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/22/16
 * Time: 1:27 PM
 */

namespace EventApp\Application\Services\Event;


use EventApp\Application\Services\ApplicationService;
use EventApp\Domain\Models\Contracts\EventRepositoryInterface;

abstract class EventService implements ApplicationService
{
    protected $event;

    /**
     * EventService constructor.
     * @param $event
     */
    public function __construct(EventRepositoryInterface $event)
    {
        $this->event = $event;
    }
}