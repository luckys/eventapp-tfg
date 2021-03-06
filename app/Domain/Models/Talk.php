<?php

namespace EventApp\Domain\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Talk extends Model
{
    use UuidModel;

    protected $table = 'talks';

    public $incrementing = false;

    protected $fillable = [
        'speaker_id',
        'title',
        'description',
        'type',
        'level',
        'start_date',
        'length',
        'address',
        'capacity',
        'total_tickets',
        'price',
        'url_slide',
        'file',
        'image',
        'notes'
    ];

    public function speaker()
    {
        return $this->belongsTo(User::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_talk')->withTimestamps();
    }
}
