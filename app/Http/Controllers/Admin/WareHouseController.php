<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WareHouse\StoreRequest;
use App\Http\Requests\WareHouse\UpdateRequest;
use App\Models\Currency;
use App\Models\WareHouse;
use App\Services\CrudOperations;
use App\Services\WareHouseService;
use Illuminate\Http\Request;

class WareHouseController extends Controller
{
    //
    public $initilizeModel = WareHouse::class;
    public $indexView = 'admin.ware-house.index';
    public $showView = 'admin.ware-house.show';
    public $createView = 'admin.ware-house.create';
    public $editView = 'admin.ware-house.edit';
    public $indexRoute = 'warehouse.index';
    public $storeRequest = StoreRequest::class;
    public $updateRequest = UpdateRequest::class;

    use CrudOperations;


    public function index()
    {
        $data = WareHouseService::index();
        return view($this->indexView,['data'=>$data]);
    }

    public function create()
    {
        $currency = Currency::get();
       return view($this->createView,['currency'=>$currency]);
    }

    public function store(StoreRequest $request){
		WareHouseService::store($request->validated());
		return redirect()->route($this->indexRoute);
	}


  public function edit($id)
  {
    $data = WareHouseService::edit($id);
    return view($this->editView, $data);
  }

  public function show($id)
  {
    $data = WareHouseService::show($id);
    return view($this->showView, $data);
  }

}
