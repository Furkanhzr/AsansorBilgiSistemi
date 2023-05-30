<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fault extends Model
{
    use HasFactory;

    public function getUser() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getElevator() {
        return $this->belongsTo(Elevator::class, 'elevator_id', 'id');
    }

    public function getTransaction() {
        return $this->hasOne(Transaction::class, 'transaction_id', 'id')->withTrashed();
    }
}
