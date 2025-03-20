<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventRule extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['description', 'event_id'];

    protected $searchableFields = ['*'];

    protected $table = 'event_rules';

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
