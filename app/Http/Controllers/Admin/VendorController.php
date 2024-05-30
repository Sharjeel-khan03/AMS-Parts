<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\StoreRequest;
use App\Http\Requests\Vendor\UpdateRequest;
use App\Models\Vendor;
use App\Services\CrudOperations;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public $initilizeModel = Vendor::class;
    public $indexView = 'admin.user-vendor.index';
    public $showView = 'admin.user-vendor.show';
    public $createView = 'admin.user-vendor.create';
    public $editView = 'admin.user-vendor.edit';
    public $indexRoute = 'vendors.index';
    public $storeRequest = StoreRequest::class;
    public $updateRequest = UpdateRequest::class;

    use CrudOperations;
}
