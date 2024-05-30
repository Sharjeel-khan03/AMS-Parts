<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    use HasFactory;

    protected $fillable = [
		"name",
		"type",
		"location",
		"currency_id",
	];

    public function currency()
    {
        return $this->belongsTo(Currency::class,'currency_id');
    }
}
