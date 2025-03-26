<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\Searchable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;
    use HasFactory;
    use Searchable;
    use HasApiTokens;

    protected $fillable = [
        'uid',
        'name',
        'email',
        'password',
        'phone',
        'usn',
        'is_paid',
        'payment_screenshot',
        'transaction_id',
        'college_name',
        'pass_type',
        'id_card',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_paid' => 'boolean',
    ];

    public function eventRegistrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('super-admin');
    }
}
