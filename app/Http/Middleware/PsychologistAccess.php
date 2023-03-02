<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PsychologistAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() and Auth::user()->role == "psychologist") {
            return $next($request);
        }
        else{
            Log::info("Admin paneline yetkisiz giriş denemesi",['ip'=>$request->getClientIp(), 'date-time'=> now()->format("d/m/Y")."-".now()->format("H:i:s")]);
            return  redirect(route('login'))->withErrors(['error'=>'Bu sayfaya erişmek için giriş yapmanız gerekiyor!']);
        }
    }
}
