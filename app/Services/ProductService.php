<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Currency;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\ItemImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductService
{
    public static function store($request)
    {
        $product = new Item();
        $product->part_no = $request['part_no'];
        $product->name = $request['name'];
        $product->slug = Str::slug($request['name'],"-");
        $product->unit_price = $request['unit_price'];
        $product->description = $request['description'];
        $product->status = 1;
        $product->save();
        // category save
        $catid = new ItemCategory();
        $catid->item_id = $product->id;
        $catid->category_id = $request['category_id'];
        $catid->sub_category_id = $request['sub_category_id'];
        $catid->save();
        // image save
        if (isset($request['image']) && !empty($request['image'])) {
            $file = $request['image'];
            if ($file->isValid()) {
                $itemimage = new ItemImage();
                $itemimage->item_id = $product->id;
                // $image = $request->file('advertise_image');
                $imageName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('item'), $imageName);
                $itemimage->image = 'item/' . $imageName;
                // $extension = $file->getClientOriginalExtension();
                // $filename_header = uniqid() . "." . $extension;
                // $filename_header = $file->move('uploads/itemimage/', $filename_header);

                // $itemimage->image = config('app.url') . '/' . $filename_header;
                $itemimage->save();
            }
        }
    }

    public static function update($request)
    {
        $data = Item::find($request['id']);
        $data->update([
			'part_no'=> $request['part_no'],
			'name'=> $request['name'],
			'unit_price'=> $request['unit_price'],
			'description'=> $request['description'],
			'status'=> 1,
			'slug'=> Str::slug($request['name'],"-"),
		]);

        $data = ItemCategory::find($request['cate_id']);

        $data->update([
			'item_id'=> $request['id'],
			'category_id'=> $request['category_id'],
			'sub_category_id'=> $request['sub_category_id'],
		]);

        if (isset($request['image'])) {
            $dataimag = ItemImage::find($request['image_id']);

            // Check if ItemImage record exists
            if ($dataimag) {
                $file = $request['image'];
                // $extension = $file->getClientOriginalExtension();
                // $filename_header = uniqid() . "." . $extension;
                // $filename_header = $file->move('uploads/itemimage/', $filename_header);
                // $dataimag->image = config('app.url') . '/' . $filename_header;
                $imageName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('item'), $imageName);
                $dataimag->image = 'item/' . $imageName;
                $dataimag->save();

            } else {
                if (isset($request['image']) && !empty($request['image'])) {
                    $file = $request['image'];
                    if ($file->isValid()) {
                        $itemimage = new ItemImage();
                        $itemimage->item_id = $request['id'];
                        // $image = $request->file('advertise_image');
                        $imageName = time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('item'), $imageName);
                        $itemimage->image = 'item/' . $imageName;
                        // $extension = $file->getClientOriginalExtension();
                        // $filename_header = uniqid() . "." . $extension;
                        // $filename_header = $file->move('uploads/itemimage/', $filename_header);

                        // $itemimage->image = config('app.url') . '/' . $filename_header;
                        $itemimage->save();
                    }
                }
                // Handle the case where the ItemImage record doesn't exist
                // For example, you could create a new ItemImage record
                // or return an error message to the user.
            }
        }

    }

    public static function edit($id)
    {
        $item = Item::with(['ItemCategory','ItemImageFront'])->find($id);
        return $item;
    }


    public static function show($id)
    {
        $item = Item::with(['ItemCategory.caetgory.subcaetgory','ItemImageFront'])->find($id);
        return $item;
    }

    public static function destroy($id)
    {
        $item = Item::find($id);
        if ($item->ItemCategory) {
            $item->ItemCategory->delete();
        }
        if ($item->ItemImage) {
            $item->ItemImage()->delete();
        }
       return $item->delete();

    }

    // for website data
    public static function getItem($slug)
    {
        $subcat = SubCategory::where('slug',$slug)->first();
        $item =ItemCategory::where('sub_category_id',$subcat->id)->with('Item.ItemImage')->get();
        return $item;
    }

    public static function getItemDetail($slug)
    {
        $item =Item::where('slug',$slug)->with('ItemImageFront')->first();
        
        return $item;
    }


}
