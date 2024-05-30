<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseOrder\StoreRequest;
use App\Http\Requests\PurchaseOrder\UpdateRequest;
use App\Models\PurchaseOrder;
use App\Services\CrudOperations;
use App\Services\PurchaseOrderService;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
	public $initilizeModel = PurchaseOrder::class;
	public $indexView = 'admin.purchase-order.index';
	public $showView = 'admin.purchase-order.show';
	public $createView = 'admin.purchase-order.create';
	public $editView = 'admin.purchase-order.edit';
	public $indexRoute = 'purchase-order.index';
	public $storeRequest = StoreRequest::class;
	public $updateRequest = UpdateRequest::class;

	use CrudOperations;

	public function create()
	{
		$data = PurchaseOrderService::create();
		return view($this->createView, ['data' => $data]);
	}

	public function store(StoreRequest $request)
	{
		PurchaseOrderService::store($request->validated());
		return redirect()->route('purchase-order.index');
	}

	public function show($id)
	{
		$data = PurchaseOrderService::show($id);
		return view($this->showView, ['data' => $data]);
	}

	public function purchaseOrderReceive(Request $request)
	{
		$data = PurchaseOrderService::purchaseOrderReceive($request->all());
		return redirect()->route('purchase-order.show', $data->purchase_request_id);
	}
}
