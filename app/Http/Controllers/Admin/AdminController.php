<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function admin_login()
    {
        if (Auth::check() && Auth::user()->role_id == '0') {
            return redirect()->route("admin.dashboard");
        }

        return view("admin.admin-login");
    }
    public function admin_auth(Request $request)
    {

        $isUserAdmin = User::where([
            "email" => $request->email,
            "role_id" => '0'
        ])->first();

        if ($isUserAdmin == null) {
            $notification = $request->session()->flash('error', 'please wait while admin approves your account');
            return redirect()->route("admin.login")->with($notification);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->route("admin.dashboard");
        }


        return view("admin.admin-login");
    }
    public function admin_dashboard()
    {
        $users = User::where('role_id', 2)->count();
        return view("admin.admin-dashboard", get_defined_vars());
    }
    public function admin_logout(Request $request)
    {
        Auth::logout();
        return redirect()->route("admin.login");
    }
}
