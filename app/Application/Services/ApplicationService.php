<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/20/16
 * Time: 4:20 PM
 */

namespace EventApp\Application\Services;


interface ApplicationService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null);

}