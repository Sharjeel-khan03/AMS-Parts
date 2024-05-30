<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\ApproveUnapproveUserRequest;
use App\Models\Organization;
use App\Models\OrganizationUser;
use App\Models\User;
use App\Services\CrudOperations;
use Illuminate\Http\Request;

class UnapproveUserController extends Controller
{
    public $initilizeModel = User::class;
    public $indexView = 'admin.unapprove-user.index';
    public $showView = 'admin.unapprove-user.show';
    public $createView = 'admin.unapprove-user.create';
    public $editView = 'admin.unapprove-user.edit';
    public $indexRoute = 'unapprove-users.index';
    public $updateRequest = ApproveUnapproveUserRequest::class;

    use CrudOperations;

    public function index()
    {
        $data = $this->model::where(['status' => 0])->get();
        return view($this->indexView, ['data' => $data]);
    }

    public function update($id, ApproveUnapproveUserRequest $request)
    {
        $user = User::find($id);
        $user->update($request->validated());
        if ($request->status == 1) {
            $organization = Organization::where('name', 'like', '%' . $user->organization . '%')->first();
            if (isset($organization->id)) {
                OrganizationUser::create([
                    "organization_id" => $organization->id,
                    "user_id" => $user->id,
                ]);
            } else {
                $organization = Organization::create([
                    "name" => $user->organization,
                ]);
                OrganizationUser::create([
                    "organization_id" => $organization->id,
                    "user_id" => $user->id,
                ]);
            }
        }
        return redirect()->route($this->indexRoute);
    }
}
