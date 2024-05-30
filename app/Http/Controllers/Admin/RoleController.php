<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRole\StoreRequest;
use App\Http\Requests\UserRole\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Services\CrudOperations;
use App\Services\UserRoleService;

class RoleController extends Controller
{
  public $initilizeModel = Role::class;
  public $indexView = 'admin.users-role.index';
  public $showView = 'admin.users-role.show';
  public $createView = 'admin.users-role.create';
  public $editView = 'admin.users-role.edit';
  public $indexRoute = 'user-roles.index';
  public $storeRequest = StoreRequest::class;
  public $updateRequest = UpdateRequest::class;

  use CrudOperations;

  public function index()
  {
    $data = UserRoleService::index();
    return view($this->indexView, ['data' => $data]);
  }

  public function destroy($id)
  {
    return UserRoleService::destroy($id);
  }
}
