<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/16/16
 * Time: 12:04 AM
 */

namespace EventApp\Repositories\Eloquent;

use EventApp\Domain\Models\Repositories\UserRepositoryInterface;
use EventApp\Domain\Models\User;

class UserRepository implements UserRepositoryInterface
{

    /**
     * @param User $user
     * @return mixed
     */
    public function save($user)
    {
        User::create($user);
    }
}