<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function itemProduct(){
        return $this->hasMany(Item::class, 'id', 'item_id');
    }

    public function itemImage(){
        return $this->belongsTo(ItemImage::class, 'id', 'item_id');
    }


    public function order(){
        return $this->hasMany(Order::class, 'id');
    }

    public function itemProductFront(){
        return $this->belongsTo(Item::class,'item_id');
    }


    public function itemCategory(){
        return $this->belongsTo(ItemCategory::class,'item_id');
    }


    public function itemQuote()
    {
        return $this->belongsTo(ItemQuotes::class,'quote_id');
    }

}
