<?php

namespace App\Models\BackendModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;

    public function get_parent_category(){
        return $this->hasMany(ParentCategory::class,'main_category_id');
    }


    public function sub_categories(){
        return $this->hasMany(SubCategory::class,'main_category_id','id');
    }


}
