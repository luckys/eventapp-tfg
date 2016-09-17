<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 9/17/16
 * Time: 8:34 PM
 */

namespace EventApp\Application\Services\Talk;


use EventApp\Domain\Models\Event;

class SubscribeTalkService extends TalkService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        try {
            $talk = $this->talk->find($id);

            $talk->events()->attach($request->all());

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getEventsSubscribible($id)
    {
        try {
            $talk = $this->talk->find($id);

            $events = Event::whereDate('start_date', '<=', $talk->start_date)
                ->whereDate('end_date', '>=', $talk->start_date)
                ->lists('name', 'id');

            return $events;

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getTalksSigned($id)
    {
        try {
            $talks = $this->talk->find($id)->events()->lists('talk_id')->toArray();

            return $talks;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}