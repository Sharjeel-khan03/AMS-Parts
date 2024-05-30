<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseOrder\StoreRequest;
use App\Http\Requests\PurchaseOrder\UpdateRequest;
use App\Models\Inventory;
use App\Models\PurchaseOrder;
use App\Services\CrudOperations;
use App\Services\InventoryService;
use App\Services\PurchaseOrderService;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
	public $initilizeModel = Inventory::class;
	public $indexView = 'admin.inventory.index';
	public $showView = 'admin.inventory.show';
	public $indexRoute = 'inventory.index';

	use CrudOperations;

	public function index()
	{
		$data = InventoryService::index();
		return view($this->indexView, ['data' => $data]);
	}

	public function show($id)
	{
		$data = InventoryService::show($id);
		return view($this->showView, ['data' => $data]);
	}

	public function fileUpload(Request $request)
	{
		return InventoryService::fileUpload($request);
	}
}
