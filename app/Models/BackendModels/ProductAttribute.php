<?php

namespace App\Models\BackendModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    public function attribute_value(){
        return $this->hasMany(AttributeValue::class, 'attribute_id');
    }
    
    public function attr_values(){
        return $this->hasMany(AttributeValue::class, 'attribute_id');
    }
}
