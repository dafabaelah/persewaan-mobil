<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function alat() {
        return $this->belongsTo(Cars::class,'cars_id');
    }

    public function payment() {
        return $this->belongsTo(Payments::class,'payments_id');
    }
}