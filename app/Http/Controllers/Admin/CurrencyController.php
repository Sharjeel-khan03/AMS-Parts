<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Currency\StoreRequest;
use App\Http\Requests\Currency\UpdateRequest;
use App\Models\Currency;
use App\Services\CrudOperations;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public $initilizeModel = Currency::class;
    public $indexView = 'admin.currency.index';
    public $showView = 'admin.currency.show';
    public $createView = 'admin.currency.create';
    public $editView = 'admin.currency.edit';
    public $indexRoute = 'currency.index';
    public $storeRequest = StoreRequest::class;
    public $updateRequest = UpdateRequest::class;

    use CrudOperations;
}
