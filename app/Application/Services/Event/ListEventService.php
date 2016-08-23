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
            return $this->event->paginate();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}