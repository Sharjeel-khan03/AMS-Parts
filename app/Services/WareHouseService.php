<?php

namespace App\Services;

use App\Models\Currency;
use App\Models\WareHouse;
use Illuminate\Http\Request;

class WareHouseService
{

    public static function index()
    {
        $data = WareHouse::with('currency')->latest()->get();
        return $data;
    }
    public static function store($request)
    {
        $warehouse = new WareHouse();
        $warehouse->name = $request['name'];
        $warehouse->type = $request['type'];
        $warehouse->location = $request['location'];
        $warehouse->currency_id = $request['currency_id'];
        $warehouse->save();
    }

    public static function edit($id)
    {
        return [
            "data" => WareHouse::find($id),
            "currency" => Currency::all(),
        ];
    }


    public static function show($id)
    {
        return [
            "data" => WareHouse::find($id),
            "currency" => Currency::all(),
        ];
    }


}
