<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sponser extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'img', 'description', 'site'];

    protected $searchableFields = ['*'];
}
