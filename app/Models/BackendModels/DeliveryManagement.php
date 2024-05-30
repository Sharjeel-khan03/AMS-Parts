<?php

namespace App\Models\BackendModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\City;


class DeliveryManagement extends Model
{
    use HasFactory;

    public function get_city(){
    return $this->hasMany(City::class,'id');
    }
}
