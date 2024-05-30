<?php

namespace App\Models\BackendModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralProduct extends Model
{
    use HasFactory;

    public function custom_products()
    {
        return $this->hasMany(Product::class, 'custom_category_id')->where('status',1);
    }

    public function get_general_cat()
    {
        return $this->hasMany(Brand::class,'id','product_brand_id');
    }


  


}