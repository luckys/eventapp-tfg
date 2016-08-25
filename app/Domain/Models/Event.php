<?php

namespace EventApp\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Event extends Model
{
    protected $table = 'event';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'address',
        'price',
        'image'
    ];

    public function setIdAttribute()
    {
        $this->attributes['id'] = Uuid::uuid4()->toString();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
