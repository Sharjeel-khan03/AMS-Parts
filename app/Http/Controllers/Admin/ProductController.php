<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Services\CrudOperations;
use App\Services\ProductService;

class ProductController extends Controller
{
    public $initilizeModel = Item::class;
    public $indexView = 'admin.item.index';
    public $showView = 'admin.item.show';
    public $createView = 'admin.item.create';
    public $editView = 'admin.item.edit';
    public $indexRoute = 'item.index';
    public $storeRequest = StoreRequest::class;
    public $updateRequest = UpdateRequest::class;

    use CrudOperations;

    public function store(StoreRequest $request){
		ProductService::store($request->validated());
		return $this->index();
	}

    public function create(){
        $category = Category::get();
        $subcategory = SubCategory::get();
        $currency = Currency::get();
		return view($this->createView, ['category' => $category,'subcategory'=>$subcategory,'currency'=>$currency]);
	}

    public function edit($id){
		$data = ProductService::edit($id);
        $category = Category::get();
        $subcategory = SubCategory::get();
        $currency = Currency::get();
		return view($this->editView, ['data' => $data,'category' => $category,'subcategory'=>$subcategory,'currency'=>$currency]);
	}

    public function show($id){
		$data = ProductService::show($id);
		return view($this->showView, ['data' => $data]);
	}

    public function destroy($id){
		$data = ProductService::destroy($id);
		return redirect()->route($this->indexRoute);
	}



    public function update(UpdateRequest $request)
    {
        ProductService::update($request->all());
		return redirect()->route($this->indexRoute);
    }


    public function getSubcategories(Request $request, $category_id) {
         // Retrieve the category
         $subcategories = Subcategory::where('category_id', $category_id)->get();

         return response()->json($subcategories);
    }

}
