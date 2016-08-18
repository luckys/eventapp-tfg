<?php

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