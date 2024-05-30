<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // if (Session::has('previousUrl')) {
        //     $previousUrl = Session::get('previousUrl');
        //     Session::forget('previousUrl');
        //     return redirect()->to($previousUrl);
        // }

        // $user = User::where('id',auth()->id())->get();
        // return $user;
        if(!Auth::check())
        {
            return redirect()->back();
        }
        if(Auth::check())
        {
            return $next($request);
        }
        return redirect()->route('user-dashboard');
        return $next($request);

    }

}
