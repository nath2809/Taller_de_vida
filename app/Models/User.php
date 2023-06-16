<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // ------------------------- \\

    protected $fillable = [
        'username',
        'lastname',
        'type_document',
        'document_number',
        'email',
        'phone_number',
        'region',
        'city',
        'birthdate',
        'image_profile',
        'role_id',
        'status',
        'password',
    ];

    // ------------------------- \\

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ------------------------- \\

    public function role(){
        return $this->belongsTo(Role::class);
    }

    // ------------------------- \\

    public function activities(){
        return $this->belongsToMany(Activity::class, 'activity_users');
    }


}
