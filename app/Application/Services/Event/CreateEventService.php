<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/22/16
 * Time: 1:32 PM
 */

namespace EventApp\Application\Services\Event;

class CreateEventService extends EventService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        try {
            $path = public_path().'/profiles/';
            $fileName = $request->file('image');
            $datas = [
                'id' => '',
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'description' => $request->description,
                'start_date' => $request->start_date.' '.$request->start_time,
                'end_date' => $request->end_date.' '.$request->end_time,
                'address' => $request->address,
                'price' => $request->price,
                'image' => $fileName->getClientOriginalName(),
            ];
            $this->event->create($datas);
            $request->file('image')->move($path, $fileName->getClientOriginalName());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}