<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    use HasFactory;

    public function getBuilding() {
        return $this->hasMany(Building::class, 'street_id', 'street_id')->withTrashed();
    }
}
