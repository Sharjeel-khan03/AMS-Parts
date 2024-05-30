<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quote\StoreRequest;
use App\Http\Requests\Quote\UpdateRequest;
use App\Models\ItemQuotes;
use App\Services\CrudOperations;
use App\Services\QuoteService;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    //
    public $initilizeModel = ItemQuotes::class;
    public $indexView = 'admin.quote.index';
    public $showView = 'admin.quote.show';
    public $createView = 'admin.quote.create';
    public $editView = 'admin.quote.edit';
    public $indexRoute = 'quote.index';
    public $storeRequest = StoreRequest::class;
    public $updateRequest = UpdateRequest::class;

    use CrudOperations;

    public function index()
    {
        $data = QuoteService::index();
        return view($this->indexView,['data'=>$data]);
    }


    public function show($id)
	{
		$data = QuoteService::show($id);
        // dd($data);
		return view($this->showView, ['data' => $data]);
	}

    public function update(Request $request)
    {
        // $data = $request->all();
        // dd($data);
        $data = QuoteService::update($request->all());
        return redirect()->route($this->indexRoute);
    }

    public function allQuote()
    {
        $data = QuoteService::allQuote();
        return view($this->indexView,['data'=>$data]);
    }
}
