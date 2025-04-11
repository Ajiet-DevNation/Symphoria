<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConcertEntry extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'entry_time',
        'verified_by',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'entry_time' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
