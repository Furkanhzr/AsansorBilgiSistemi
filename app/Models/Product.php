<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function getImage() {
        return $this->hasMany(Image::class, 'image_id', 'id')->withTrashed();
    }
}
