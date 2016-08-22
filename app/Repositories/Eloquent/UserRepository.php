<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/20/16
 * Time: 2:56 PM
 */

namespace EventApp\Repositories\Eloquent;

use EventApp\Domain\Models\Contracts\UserRepositoryInterface;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return 'EventApp\Domain\Models\User';
    }
}