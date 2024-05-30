<?php

namespace App\Services;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{


    public static function role()
    {
        return $roles = Role::where('id', '!=', 1)->get();
    }

    public static function store($data)
    {
        $data['slug'] = Str::slug($data['first_name'] . " " . $data['last_name'], "-");
        $data['password'] = Hash::make($data['password']);
        $data['status'] = 1;

        $user = User::create($data);
        return $user;
    }

    public static function update($data, $id)
    {
        $data['slug'] = Str::slug($data['first_name'] . " " . $data['last_name'], "-");
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user = User::find($id)->update($data);
        return $user;
    }

    public static function create()
    {
        return [
            "roles" => Role::all(),
        ];
    }

    public static function edit($id)
    {
        return [
            "data" => User::find($id),
            "roles" => Role::all(),
        ];
    }

    // public static function update($request,$id)
    // {
    //     $userupdate = User::find($id);
    //     $userupdate->first_name = $request->first_name;
    //     $userupdate->last_name = $request->last_name;
    //     $userupdate->name = $request->first_name." ".$request->last_name;
    //     $userupdate->email = $request->email;
    //     $userupdate->user_name = $request->user_name;
    //     $userupdate->slug = Str::slug($request->first_name." ".$request->last_name,"-");
    //     $userupdate->password = Hash::make($request->password);
    //     $userupdate->role_id = $request->role_id;
    //     $userupdate->status = 1;
    //     $userupdate->save();
    //     return $userupdate;
    // }

}
