<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->role == 'super_admin' || Auth::user() &&  Auth::user()->role == 'admin' || Auth::user() &&  Auth::user()->role == 'saksi') {
            return $next($request);
        }
        return redirect()->route('admin.login')->with('error','You have not admin access');
    }
}
