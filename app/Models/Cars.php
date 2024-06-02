<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function order() {
        return $this->hasMany(Order::class,'cars_id','id');
    }
}
