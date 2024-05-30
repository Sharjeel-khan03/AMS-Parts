<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemCategory extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function Item(){
        return $this->hasMany(Item::class,'id','item_id');
    }


    public function caetgory(){
        return $this->belongsTo(Category::class,'category_id');
    }

    // public function subcaetgory(){
    //     return $this->belongsTo(SubCategory::class,'id','sub_category_id');
    // }




}
