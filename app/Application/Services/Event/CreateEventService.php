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
            $path = public_path().'/uploads/events/';
            $fileName = $request->file('image');
            $datas = [
                'author_id' => auth()->user()->id,
                'name' => $request->name,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'address' => $request->address,
                'capacity' => $request->capacity,
                'total_tickets' => $request->capacity,
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