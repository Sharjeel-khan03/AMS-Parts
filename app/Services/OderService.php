<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Item;
use App\Models\ItemQuotes;
use Illuminate\Http\Request;

class OderService
{
    public static function index()
    {
        $data = Order::with(['user', 'orderLine.itemProduct'])->orWhere('status', 1)->latest()->get();
        return $data;
    }

    public static function show($id)
    {
        $data = Order::with(['user', 'shippingAddress', 'orderLine.itemProduct.itemImage','orderLine.itemQuote'])->find($id);
        return $data;
    }

    public static function allOrder()
    {
        $data = Order::with(['user', 'orderLine.itemProduct'])->latest()->get();
        return $data;
    }

    public static function allInvoice()
    {
        $data = Order::with(['orderLineFront.itemProductFront'])->latest()->get();
        return $data;
    }

 public static function ShowInvoice($id)
    {
        $data = Order::with(['user', 'shippingAddress', 'orderLine.itemProduct.itemImage'])->find($id);
        return $data;
    }

    public static function changeStatus($data)
    {
        $orderstatus = Order::find($data['order_id']);
        $orderstatus->update([
            'status' => $data['order_status'],
        ]);
        return $orderstatus;
    }
}
