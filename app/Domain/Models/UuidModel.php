<?php
/**
 * Created by PhpStorm.
 * User: luckys
 * Date: 9/4/16
 * Time: 12:09 PM
 */

namespace EventApp\Domain\Models;

use Ramsey\Uuid\Uuid;

trait UuidModel
{
    /**
     *
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Uuid::uuid4()->toString();
        });

        static::saving(function ($model) {
            // What's that, trying to change the UUID huh?  Nope, not gonna happen.
            $original_uuid = $model->getOriginal('id');

            if ($original_uuid !== $model->id) {
                $model->id = $original_uuid;
            }
        });
    }
}