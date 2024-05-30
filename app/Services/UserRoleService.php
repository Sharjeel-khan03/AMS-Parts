<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserRoleService
{
    public static function index()
    {
        $data = Role::latest()->get();
        return $data;
    }

    public static function destroy($id)
    {
        $count = User::where(['role_id' => $id])->get()->count();
    }
}
