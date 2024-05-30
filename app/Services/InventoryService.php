<?php

namespace App\Services;

use App\Imports\InventoryImport;
use App\Models\Inventory;
use App\Models\Item;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderLine;
use App\Models\Vendor;
use App\Models\WareHouse;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class InventoryService
{
    public static function index()
    {
        return DB::table('inventories')
            ->select([
                'inventories.part_no as part_no',
                'items.name as item_name',
                'categories.name as category_name',
                DB::raw('SUM(on_hand_quantity) as on_hand_quantity'),
                DB::raw('SUM(allocated_quantity) as allocated_quantity'),
                DB::raw('SUM(available_quantity) as available_quantity'),
                // 'items.name as item_name',
                'inventories.id as id',
            ])
            ->leftJoin('items', 'items.part_no', '=', 'inventories.part_no')
            ->leftJoin('item_categories', 'item_categories.item_id', '=', 'items.id')
            ->leftJoin('categories', 'categories.id', '=', 'item_categories.category_id')
            ->groupBy(['inventories.part_no'])
            ->orderBy('inventories.id', 'desc')
            ->get();
    }

    public static function show($id)
    {
        $po = PurchaseOrder::with(['vendor', 'warehouse', 'lines.item'])->find($id);
        return $po;
    }

    public static function fileUpload($request)
    {
        try {
            Excel::import(new InventoryImport, $request->file);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 400);
        }
    }
}
