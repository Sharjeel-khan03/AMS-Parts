<?php

namespace App\Models\BackendModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;
    protected $fillable = [
        'shipping_fee',
        'contact',
        'email',
        'map_link',
        'address',
        'copy_right',
        'business_hours',
        'facebook',
        'instagram',
        'twitter',
        'pinterest',
        'youtube',
        'financing_image',
        'financing_url',
    ];

}
