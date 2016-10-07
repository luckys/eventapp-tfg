<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 10/7/16
 * Time: 10:46 AM
 */

namespace EventApp\Application\Services\User;


class UpdatePasswordService extends UserService
{

    /**
     * @param null $request
     * @param null $id
     * @return mixed
     */
    public function execute($request = null, $id = null)
    {
        $newPassword = ['password' => $request->password];

        $this->user->update($newPassword, auth()->user()->id);
    }
}