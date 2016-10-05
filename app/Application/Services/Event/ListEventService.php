<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/23/16
 * Time: 10:13 AM
 */

namespace EventApp\Application\Services\Event;


class ListEventService extends EventService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        try {
            return $this->event->allWhere(['author_id' => auth()->user()->id]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return mixed
     */
    public function getAllEvents()
    {
        try {
            return $this->event->orderBy('created_at', 'desc')->findWhere([['total_tickets', '>', 0]]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}