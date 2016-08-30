<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/30/16
 * Time: 10:40 AM
 */

namespace EventApp\Application\Services\Talk;


class ListTalkService extends TalkService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        try {
            return $this->talk->paginate();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return mixed
     */
    public function getAllTalks()
    {
        try {
            return $this->talk->orderBy('created_at', 'desc')->all();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}