<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/16/16
 * Time: 6:39 PM
 */

namespace EventApp\Application\Services\User;


use EventApp\Application\Services\ApplicationService;
use EventApp\Domain\Models\Repositories\UserRepositoryInterface;

abstract class UserService implements ApplicationService
{
    protected $user;

    /**
     * UserService constructor.
     * @param $user
     */
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }


}