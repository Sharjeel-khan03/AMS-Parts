<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Organization\StoreRequest;
use App\Models\Organization;
use App\Services\CrudOperations;
use App\Services\OrganizationService;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public $initilizeModel = Organization::class;
    public $indexView = 'admin.organizations.index';
    public $showView = 'admin.organizations.show';
    public $createView = 'admin.organizations.create';
    public $editView = 'admin.organizations.edit';
    public $indexRoute = 'organizations.index';
    public $storeRequest = StoreRequest::class;
    public $updateRequest = StoreRequest::class;
    public $usersEditView = 'admin.organizations.edit-users';
    public $categoriesEditView = 'admin.organizations.edit-categories';

    use CrudOperations;

    public function index()
    {
        $data = OrganizationService::index();
        return view($this->indexView, ['data' => $data]);
    }

    public function editUsersList($id)
    {
        
        $data = OrganizationService::editUsersList($id);
        // dd($data);
        return view($this->usersEditView, $data);
    }

    public function editCategoriesList($id)
    {
        $data = OrganizationService::editCategoriesList($id);
        return view($this->categoriesEditView, $data);
    }

    public function updateUsersList($id, Request $request)
    {
        $data = OrganizationService::updateUsersList($id, $request->all());
        // return $data;
        return redirect()->route($this->indexRoute);
    }

    public function updateCategoriesList($id, Request $request)
    {
        $data = OrganizationService::updateCategoriesList($id, $request->all());
        return redirect()->route($this->indexRoute);
    }
}
