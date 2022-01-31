<?php

namespace App\Http\Middleware;

use Closure;
use Alert;
use Illuminate\Http\Request;
use App\Models\CandidateType;

class CheckCandidateType
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
        $candidateType = CandidateType::all();
        if ($candidateType->isEmpty()) {
            Alert::info('Info', "Buat tipe kandidat baru terlebih dahulu!");
            return redirect(route('candidate-types.index'));
        }

        return $next($request);
    }
}
