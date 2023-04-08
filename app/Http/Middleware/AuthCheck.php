<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCheck
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
        if (Auth::guest()){
            return $next($request);
        }else{
            if (Auth::user()->role =="admin") {
                return redirect(route("admin.index"));
            }if (Auth::user()->role =="psychologist") {
                return redirect(route("psychologist.index"));
            }if (Auth::user()->role =="user") {
                return redirect(route("admin.users.index"));
            }

        }
    }
}
