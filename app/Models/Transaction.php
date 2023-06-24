<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function getUser() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getFault() {
        return $this->belongsTo(Fault::class, 'transaction_id', 'id')->withTrashed();
    }

    public function getRepair() {
        return $this->belongsTo(Repair::class, 'transaction_id', 'id')->withTrashed();
    }
}
