<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategory\StoreRequest;
use App\Http\Requests\SubCategory\UpdateRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Services\CrudOperations;
use Illuminate\Http\Request;
use App\Services\SubCategoryService;

class SubCategoryController extends Controller
{
    //
    public $initilizeModel = SubCategory::class;
    public $indexView = 'admin.sub-category.index';
    public $showView = 'admin.sub-category.show';
    public $createView = 'admin.sub-category.create';
    public $editView = 'admin.sub-category.edit';
    public $indexRoute = 'sub-categories.index';
    public $storeRequest = StoreRequest::class;
    public $updateRequest = UpdateRequest::class;

    use CrudOperations;
    public function index()
    {
        $data = SubCategoryService::index();
        return view($this->indexView,['data'=>$data]);
    }
    public function create()
    {
        $data = SubCategoryService::create();
        return view($this->createView,['data'=>$data]);
    }
    public function edit($id)
    {
		$data = SubCategoryService::edit($id);
		$dataCat = Category::get();
		return view($this->editView, ['data' => $data,'dataCat'=>$dataCat]);


    }
}
