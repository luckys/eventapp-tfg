<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 11/22/16
 * Time: 11:44 AM
 */

namespace EventApp\Application\Services\Event;


class DeleteStateEventService extends EventService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        try {
            return $this->event
                ->find($request->event_id)
                ->talks()
                ->detach($request->talk_id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }
}