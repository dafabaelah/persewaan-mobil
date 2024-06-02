<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'user_id',
        'order_starts',
        'order_ends',
        'order_total_price',
        'order_total_qty',
        'order_status',
        'order_duration',
    ];

    protected $guarded = [];  

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function cars() {
        return $this->belongsTo(Cars::class,'car_id');
    }
}
