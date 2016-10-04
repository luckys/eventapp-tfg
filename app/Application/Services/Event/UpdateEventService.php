<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 9/4/16
 * Time: 12:47 PM
 */

namespace EventApp\Application\Services\Event;


use Illuminate\Support\Facades\File;

class UpdateEventService extends EventService
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
            if (!is_null($request->file('image'))) {
                File::delete($path.$fileName);
                $fileName = $request->file('image')->getClientOriginalName();
                $request->file('image')->move($path, $fileName);
            }
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
                'image' => $fileName,
            ];
            $this->event->update($datas, $id);

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}