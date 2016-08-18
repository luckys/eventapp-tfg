<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/16/16
 * Time: 6:42 PM
 */

namespace EventApp\Application\Services\User;

use Dingo\Api\Exception\ResourceException;

class SignUpUserService extends UserService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        try {
            $this->user->save($request->all());
        } catch (\Exception $e) {
            throw new ResourceException($e->getMessage());
        }
    }
}