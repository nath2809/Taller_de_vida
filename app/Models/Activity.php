<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'author_id',
        'description',
        'region',
        'city',
        'participants',
        'boys',
        'girls',
        'attendance',
        'report',
        'image_activity',
    ];

    protected $dates = [
        'created_at', 
        'updated_at'
    ];


    //Relacion muchos a muchos con los usuarios
    public function users(){
        return $this->belongsToMany(User::class, 'activity_users');
    }

    //Relacion 1 a muchos con os autores
    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }

    //Relacion muchos a muchos con las imagenes de las actividades
    public function images(){
        return $this->hasMany(Image::class);
    }
}
