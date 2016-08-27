<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/27/16
 * Time: 12:08 PM
 */

namespace EventApp\Application\Services\Talk;


class CreateTalkService extends TalkService
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
            $imageName = $request->file('image');
            $fileName = $request->file('file');
            $datas = [
                'id' => '',
                'speaker_id' => auth()->user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'level' => $request->level,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'length' => $request->length,
                'address' => $request->address,
                'price' => $request->price,
                'url_slide' => $request->url_slide,
                'file' => $fileName ? $fileName->getClientOriginalName() : '',
                'image' => $imageName ? $imageName->getClientOriginalName() : '',
                'notes' => $request->notes
            ];

            $this->talk->create($datas);
            if($fileName)
            $request->file('file')->move($pathFile, $fileName->getClientOriginalName());
            if($imageName)
            $request->file('image')->move($pathImage, $imageName->getClientOriginalName());
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}