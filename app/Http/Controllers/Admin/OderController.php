<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\CrudOperations;
use App\Services\OderService;
use Illuminate\Http\Request;

class OderController extends Controller
{
    //
    public $initilizeModel = Order::class;
    public $indexView = 'admin.order.index';
    public $showView = 'admin.order.show';
    public $createView = 'admin.order.create';
    public $editView = 'admin.order.edit';
    public $indexRoute = 'orders.index';
    public $invoiceindex = 'admin.order.invoice';
    public $invoiceshow = 'admin.order.invoice_show';


    // public $storeRequest = StoreRequest::class;
    // public $updateRequest = UpdateRequest::class;

    use CrudOperations;

    public function index(){
        $data = OderService::index();
        return view($this->indexView,['data'=>$data]);
	}

    public function show($id){
		$data = OderService::show($id);
        // return $data;
		return view($this->showView, ['data' => $data]);
	}

    public function ShowInvoice($id){
		$data = OderService::ShowInvoice($id);
        // return $data;
		return view($this->invoiceshow, ['data' => $data]);
	}

    public function allOrder()
    {
        $data = OderService::allOrder();
        return view($this->indexView,['data'=>$data]);
    }

    public function allInvoice()
    {
        $data = OderService::allInvoice();
        // return $data;
        return view($this->invoiceindex,['data'=>$data]);
    }

    public function changeStatus(Request $request)
    {

        $data = OderService::changeStatus($request->all());
        // return $data;
        $notification = $request->session()->flash('success', 'Successfully Change Oder Status!');
        return redirect()->route('orders.show', $data->id)->with($notification);;
    }

}
