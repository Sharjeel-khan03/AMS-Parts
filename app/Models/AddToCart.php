<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
    use HasFactory;

    public function ItemCart(){
        return $this->hasMany(Item::class,'id','item_id');
    }
}
