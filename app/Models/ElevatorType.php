<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElevatorType extends Model
{
    use HasFactory;

    public function getElevator() {
        return $this->hasMany(Elevator::class, 'elevator_type_id', 'id')->withTrashed();
    }

    public function getImage() {
        return $this->hasMany(Image::class, 'image_id', 'id')->withTrashed();
    }
}
