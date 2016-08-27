<?php

namespace EventApp\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Talk extends Model
{
    protected $table = 'talks';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'speaker_id',
        'title',
        'description',
        'type',
        'level',
        'start_date',
        'end_date',
        'length',
        'address',
        'price',
        'url_slide',
        'file',
        'image',
        'notes'
    ];

    public function setIdAttribute()
    {
        $this->attributes['id'] = Uuid::uuid4()->toString();
    }

    public function speaker()
    {
        return $this->belongsTo(User::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class)->withTimestamps();
    }
}
