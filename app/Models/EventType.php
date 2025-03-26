<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventType extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['type'];

    protected $searchableFields = ['*'];

    protected $table = 'event_types';

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
