<?php

namespace App\Models\BackendModels;

// use BinaryCats\Sku\HasSku;
use App\Models\FrontendModels\Order;
use App\Models\FrontendModels\Review;
use BinaryCats\Sku\Concerns\SkuOptions;
use Illuminate\Database\Eloquent\Model;
use App\Models\BackendModels\ProductAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    // use HasSku;

    // public function skuOptions(): SkuOptions
    // {
    //     return SkuOptions::make()
    //         ->from(['label', 'another_field'])
    //         ->target('sku')
    //         ->using('fsdesign-')
    //         ->forceUnique(false)
    //         ->generateOnCreate(true)
    //         ->refreshOnUpdate(false);
    // }
}
