<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 9/20/16
 * Time: 3:35 PM
 */

namespace EventApp\Application\Services\Event;


class UnsubscribeEventService extends EventService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        try {
            $event = $this->event->find($request->event_id);

            $event->talks()->detach($id, ['initial_date' => $event->start_date]);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}