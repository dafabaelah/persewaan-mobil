<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    protected $fillable = [
        'cars_model',
        'cars_brand',
        'cars_nopol',
        'cars_image',
        'category_id',
        'cars_description',
        'cars_price',
    ];

    protected $guarded = [];    

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function order() {
        return $this->hasMany(Order::class,'cars_id','id');
    }
}
