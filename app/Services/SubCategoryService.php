<?php

namespace App\Services;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryService
{
    public static function index()
    {
        $data = SubCategory::with(['category'])->latest()->get();
        return $data;
    }
   public static function create()
   {
    $data = Category::get();
    return $data;
   }

   public static function edit($id)
    {
        $data = SubCategory::find($id);
        return $data;
    }
}
