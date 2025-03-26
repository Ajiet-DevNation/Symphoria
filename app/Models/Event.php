<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'img',
        'name',
        'description',
        'event_type_id',
        'branch',
        'date',
        'is_registration',
        'location',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date' => 'datetime',
        'is_registration' => 'boolean',
    ];

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

    public function eventOrganizers()
    {
        return $this->hasMany(EventOrganizer::class);
    }

    public function eventRules()
    {
        return $this->hasMany(EventRule::class);
    }

    public function eventRegistrations()
    {
        return $this->hasMany(EventRegistration::class);
    }
}
