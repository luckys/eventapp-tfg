<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/27/16
 * Time: 11:54 AM
 */

namespace EventApp\Repositories\Eloquent;

use EventApp\Domain\Models\Contracts\TalkRepositoryInterface;

class TalkRepository extends EloquentRepository implements TalkRepositoryInterface
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return 'EventApp\Domain\Models\Talk';
    }

    public function subscribe(array $data)
    {
        $this->model()->events()->attach($data);
    }
}