<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainOrganizer extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'img', 'position', 'email', 'phone'];

    protected $searchableFields = ['*'];

    protected $table = 'main_organizers';
}
