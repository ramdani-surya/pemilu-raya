<?php

namespace App\Http\Middleware;

use Closure;
use Alert;
use Illuminate\Http\Request;
use App\Models\Faculty;

class CheckFaculty
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
        $faculty = Faculty::all();
        if ($faculty->isEmpty()) {
            Alert::info('Info', "Buat fakultas baru terlebih dahulu!");
            return redirect(route('faculties.index'));
        }

        return $next($request);
    }
}
