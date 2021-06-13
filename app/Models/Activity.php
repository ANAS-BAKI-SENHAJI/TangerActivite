<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price', 
        'description', 
        'duration_of_activity',
        'min_number_of_people',
        'max_number_of_people',
        'included_equipment', //boolean
        'included_transport', //boolean
        'equipments_included', //will contain many equipments
        'image' //should contain several images (Idk if it's possible)
    ];

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
