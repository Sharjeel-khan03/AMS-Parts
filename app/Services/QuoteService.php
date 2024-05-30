<?php

namespace App\Services;

use App\Models\Item;
use App\Models\ItemQuotes;
use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Http\Request;

class QuoteService
{
    public static function index()
    {
        $data = ItemQuotes::with(['user','item'])->Where('status',1)->get();
        return $data;
    }

    public static function show($id){
		$qo = ItemQuotes::with(['itemView','itemuser'])->find($id);
		return $qo;
	}

    public static function update($data)
    {
        // dd($)
        $dataquot = ItemQuotes::find($data['id']);
        $dataquot->update([
			'company_offer' => $data['company_offer'] ,
			'status' => $data['status'],
		]);
        if($data['status'] == 2){
		$item = Item::where(['id' => $dataquot->item_id])->first();

       $order = Order::create([
			"user_id" => $dataquot['user_id'],
			"total" => $data['custome_price'] * $data['quantity'] ,
			"status" => 1,
			// "allocated_quantity" => 0,
			// "available_quantity" => 0,
		]);

        OrderLine::create([
			"order_id" => $order->id,
			"quote_id" => $data['id'],
			"item_id" => $item->id,
			"quantity" => $data['quantity'],
			"total_cost" =>  $data['custome_price'] * $data['quantity'],
		]);
    }
		return $dataquot;


    }

    public static function allQuote()
    {
        $data = ItemQuotes::with(['user','item'])->get();
        return $data;
    }

}
