<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Item extends Model
{
    use HasFactory , SoftDeletes;

    protected $guarded = [];

    public function ItemCategory(){
        return $this->belongsTo(ItemCategory::class,'id','item_id');
    }

    public function ItemImage(){
        return $this->hasMany(ItemImage::class,'item_id');
    }

    public function ItemImageFront(){
        return $this->hasOne(ItemImage::class,'item_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'item_categories', 'item_id', 'category_id');
    }
}
