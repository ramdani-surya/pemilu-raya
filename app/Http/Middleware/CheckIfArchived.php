<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Election;
use Alert;

class CheckIfArchived
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
        $election = Election::where('archived', '0')->first();

        if ($election) {
            Alert::info('Info', "Pemilu belum di arsipkan!");
            return redirect()->route('elections.index');
        } else {
            return redirect()->route('result');
        }

        return $next($request);
    }
}
