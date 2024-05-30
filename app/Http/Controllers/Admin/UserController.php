<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\UpdateRequest;
use App\Models\User;
use App\Services\CrudOperations;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

  public $initilizeModel = User::class;
  public $indexView = 'admin.user.index';
  public $showView = 'admin.user.index';
  public $createView = 'admin.user.create';
  public $editView = 'admin.user.edit';
  public $indexRoute = 'users.index';
  public $storeRequest = StoreRequest::class;
  public $updateRequest = UpdateRequest::class;

  use CrudOperations;

  public function index()
  {
    $data = $this->model::where(['status' => 1])->latest()->get();
    return view($this->indexView, ['data' => $data]);
  }

  public function create()
  {
    $data = UserService::create();
    return view($this->createView, $data);
  }

  public function edit($id)
  {
    $data = UserService::edit($id);
    return view($this->editView, $data);
  }

  public function store(StoreRequest $request)
  {
    UserService::store($request->validated());
    return $this->index();
  }

  public function update(UpdateRequest $request, $id)
  {
    UserService::update($request->validated(), $id);
    return $this->index();
  }
}
