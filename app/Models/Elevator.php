<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elevator extends Model
{
    use HasFactory;

    public function getBuilding() {
        return $this->belongsTo(Building::class, 'building_id', 'id')->withTrashed();
    }

    public function getElevatorType() {
        return $this->belongsTo(ElevatorType::class, 'elevator_type_id', 'id')->withTrashed();
    }

    public function getFault() {
        return $this->hasMany(Fault::class, 'elevator_id', 'id')->withTrashed();
    }

    public function getRepair() {
        return $this->hasMany(Repair::class, 'elevator_id', 'id')->withTrashed();
    }
}
