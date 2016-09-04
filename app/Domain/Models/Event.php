<?php

namespace EventApp\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Event extends Model
{
    use UuidModel;

    protected $table = 'events';

    public $incrementing = false;

    protected $fillable = [
        'author_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'address',
        'price',
        'image'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function talks()
    {
        return $this->belongsToMany(Talk::class)->withTimestamps();
    }
}
