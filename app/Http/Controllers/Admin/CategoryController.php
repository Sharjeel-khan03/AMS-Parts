<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use App\Models\Currency;
use App\Services\CategoryService;
use App\Services\CrudOperations;

class CategoryController extends Controller
{
    public $initilizeModel = Category::class;
    public $indexView = 'admin.category.index';
    public $showView = 'admin.category.show';
    public $createView = 'admin.category.create';
    public $editView = 'admin.category.edit';
    public $indexRoute = 'categories.index';
    public $storeRequest = StoreRequest::class;
    public $updateRequest = UpdateRequest::class;

    use CrudOperations;




}
