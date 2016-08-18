<?php


namespace EventApp\Domain\Models\Repositories;


interface UserRepositoryInterface
{

    /**
     * @param $user
     * @return mixed
     */
    public function save($user);

}