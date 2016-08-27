<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/26/16
 * Time: 5:49 PM
 */

namespace EventApp\Application\Services\Event;


class ShowEventService extends EventService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        try {
            return $this->event->find($id);
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
}