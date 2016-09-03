<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 9/3/16
 * Time: 7:57 PM
 */

namespace EventApp\Application\Services\Talk;


class ShowTalkService extends TalkService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        try {
            return $this->talk->find($id);
        } catch (\Exception $e){
            $e->getMessage();
        }
    }
}