<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;

    public function getElevator() {
        return $this->belongsTo(Elevator::class, 'elevator_id', 'id')->withTrashed();
    }

    public function getTransaction() {
        return $this->hasOne(Transaction::class, 'transaction_id', 'id')->withTrashed();
    }
}
