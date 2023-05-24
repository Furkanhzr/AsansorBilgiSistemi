<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;


    public function getUser() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getElevator() {
        return $this->hasMany(Elevator::class, 'building_id', 'id')->withTrashed();
    }

}
