<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function getElevatorType() {
        return $this->belongsTo(ElevatorType::class, 'image_id', 'id')->withTrashed();
    }
}
