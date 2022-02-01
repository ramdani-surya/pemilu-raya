<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Candidate;
use Alert;

class CheckCandidate
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
        $candidate = Candidate::all();
        if ($candidate->isEmpty()) {
            Alert::info('Info', "Buat kandidat baru terlebih dahulu!");
            return redirect(route('candidates.index'));
        }
        return $next($request);
    }
}
