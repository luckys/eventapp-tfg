<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/27/16
 * Time: 12:08 PM
 */

namespace EventApp\Application\Services\Talk;


use Illuminate\Support\Facades\File;

class UpdateTalkService extends TalkService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        try {
            $pathImage = public_path().'/uploads/talks/';
            $pathFile = public_path().'/uploads/talks/files/';
            $imageName = $this->talk->find($id)->image;
            $fileName = $this->talk->find($id)->file;
            if(!is_null($request->file('file'))) {
                File::delete($pathFile.$fileName);
                $fileName = $request->file('file')->getClientOriginalName();
                $request->file('file')->move($pathFile, $fileName);
            }
            if(!is_null($request->file('image'))) {
                File::delete($pathImage.$imageName);
                $imageName = $request->file('image')->getClientOriginalName();
                $request->file('image')->move($pathImage, $imageName);
            }
            $datas = [
                'speaker_id' => auth()->user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'level' => $request->level,
                'start_date' => $request->start_date,
                'length' => $request->length,
                'address' => $request->address,
                'capacity' => $request->capacity,
                'total_tickets' => $request->capacity,
                'price' => $request->price,
                'url_slide' => $request->url_slide,
                'file' => $fileName,
                'image' => $imageName,
                'notes' => $request->notes
            ];

            $this->talk->update($datas, $id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}