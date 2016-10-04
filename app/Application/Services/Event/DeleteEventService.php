<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 9/6/16
 * Time: 3:13 PM
 */

namespace EventApp\Application\Services\Event;


use Illuminate\Support\Facades\File;

class DeleteEventService extends EventService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        try {
            $path = public_path().'/uploads/events/';
            $fileName = $this->event->find($id)->image;
            File::delete($path.$fileName);
            $this->event->delete($id);
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
}