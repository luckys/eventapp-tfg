<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 8/22/16
 * Time: 1:19 PM
 */

namespace EventApp\Repositories\Eloquent;

use EventApp\Domain\Models\Contracts\EventRepositoryInterface;

class EventRepository extends EloquentRepository implements EventRepositoryInterface
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return 'EventApp\Domain\Models\Event';
    }
}