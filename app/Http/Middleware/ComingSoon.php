<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ComingSoon
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
        // $now = date('Y-m-d H:i:s');
        // $deadline = '2022-02-08 09:00:00'; //Statis PEMIRA 2022-2023 BEM - BPM

        // if ($deadline <= $now) {
        //     return redirect(route('result'));
        //     return $next($request);die;
        // }
        if (!getRunningElection() && getActiveElection()) {
            return redirect(route('coming_soon'));
        }
        elseif (!getRunningElection() && !getActiveElection()) {
            return redirect(route('closed'));
        }

        return $next($request);
    }
}
