<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cars extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'cars_model',
        'cars_brand',
        'cars_nopol',
        'cars_image',
        'category_id',
        'cars_description',
        'cars_price',
        'is_deleted',
    ];

    protected $guarded = []; 
    
    protected $dates = ['deleted_at'];
    public $timestamps = true;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function order() {
        return $this->hasMany(Order::class,'cars_id','id');
    }
}
