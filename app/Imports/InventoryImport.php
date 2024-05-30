<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Inventory;
use App\Models\Item;
use App\Models\ItemCategory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class InventoryImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $value) {
            if ($key != 0) {
                if (!empty($value[0])) {
                    $part_no = trim($value[0]);
                    $category_name = trim($value[2]);
                    if (!DB::table('items')->where('part_no', $part_no)->exists()) {
                        $item = Item::create([
                            "name" => $value[1],
                            "slug" => $part_no,
                            "description" => $value[1],
                            "part_no" => $part_no,
                            "unit_price" => $value[5] ?? 0,
                            "status" => 1,
                        ]);
                        $category = DB::table('categories')->where('name', $category_name)->first();
                        if (!isset($category->name)) {
                            $category = Category::create([
                                'name' => $category_name
                            ]);
                        }
                        ItemCategory::create([
                            'category_id' => $category->id,
                            'sub_category_id' => 0,
                            'item_id' => $item->id,
                        ]);
                    }
                    Inventory::create([
                        'part_no' => $part_no,
                        'location' => $value[11],
                        'on_hand_quantity' => $value[6] ?? 0,
                    ]);
                }
            }
        }
    }
}
