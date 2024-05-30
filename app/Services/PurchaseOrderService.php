<?php

namespace App\Services;

use App\Models\Inventory;
use App\Models\Item;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderLine;
use App\Models\Vendor;
use App\Models\WareHouse;
use Illuminate\Support\Arr;

class PurchaseOrderService
{

	public static function create()
	{
		return [
			"vendors" => Vendor::all(),
			"warehouses" => WareHouse::all(),
			"items" => Item::all(),
		];
	}

	public static function store($data)
	{
		$po = PurchaseOrder::create(Arr::except($data, ['lines']));
		for ($i = 0; $i < count($data['lines']); $i++) {
			$data['lines'][$i]['purchase_request_id'] = $po->id;
		}
		PurchaseOrderLine::insert($data['lines']);
	}

	public static function show($id)
	{
		$po = PurchaseOrder::with(['vendor', 'warehouse', 'lines.item'])->find($id);
		return $po;
	}

	public static function purchaseOrderReceive($data)
	{
		$poline = PurchaseOrderLine::find($data['line_id']);
		$poline->update([
			'receive_qty' => $poline->receive_qty + $data['receive_qty'],
			'status' => 'partial',
		]);

		$item = Item::where(['id' => $poline->item_id])->first();

		Inventory::create([
			"item_id" => $item->id,
			"part_no" => $item->part_no,
			"on_hand_quantity" => $data['receive_qty'],
			"allocated_quantity" => 0,
			"available_quantity" => 0,
		]);

		$poline = PurchaseOrderLine::find($data['line_id']);
		if ($poline->receive_qty >= $poline->quantity) {
			$poline->update([
				'status' => 'completed',
			]);
		}

		return $poline;
	}
}
