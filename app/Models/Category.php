<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
	use HasFactory;

	protected $fillable = [
		"name",
	];

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }
    public function getParentCategory(){
        return $this->hasMany(SubCategory::class,'category_id');
    }

    public function subcaetgory(){
        return $this->belongsTo(SubCategory::class,'id');
    }

    public function organizationUsers()
    {
        return $this->hasManyl(OrganizationUser::class,'id',);
    }
//
    // public function items()
    // {
    //     return $this->belongsToMany(Item::class, 'item_categories', 'category_id', 'item_id');
    // }

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class,'id');
    }

    public function products()
    {
        return $this->hasMany(ItemCategory::class);
    }
}
