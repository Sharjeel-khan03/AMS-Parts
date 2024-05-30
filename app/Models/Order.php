<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use HasFactory;
    protected $guarded = [];


    public function orderLine(){
        return $this->hasMany(OrderLine::class, 'order_id', 'id');
    }

     public function user(){
        return $this->belongsTo(user::class, 'user_id');
    }

    public function orderLineFront(){
        return $this->hasMany(OrderLine::class, 'order_id');
    }

    public function shippingAddress(){
        return $this->belongsTo(ShippingAddress::class, 'id','order_id');
    }








}
