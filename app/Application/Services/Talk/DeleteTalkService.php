<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 9/6/16
 * Time: 8:42 PM
 */

namespace EventApp\Application\Services\Talk;


use Illuminate\Support\Facades\File;

class DeleteTalkService extends TalkService
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
            File::delete($pathImage.$imageName);
            File::delete($pathFile.$fileName);
            $this->talk->delete($id);
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
}