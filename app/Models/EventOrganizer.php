<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventOrganizer extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'email',
        'name',
        'position',
        'phone',
        'event_id',
        'img',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'event_organizers';

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
