<?php

namespace App\Models\BackendModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public function get_parent_category(){
        return $this->belongsTo(ParentCategory::class,'parent_category_id');
    }
    public function get_main_category(){
        return $this->belongsTo(MainCategory::class,'main_category_id');
    }
}
