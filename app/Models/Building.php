<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    public function getStreet() {
        return $this->belongsTo(Street::class, 'street_id', 'street_id')->withTrashed();
    }

    public function getUser() {
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
    }

}
