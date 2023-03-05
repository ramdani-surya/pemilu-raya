<?php

namespace App\Http\Middleware;

use Closure;
use Alert;
use Illuminate\Http\Request;
use App\Models\StudyProgram;

class CheckStudyProgram
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
        $studyProgram = StudyProgram::all();
        if ($studyProgram->isEmpty()) {
            Alert::info('Info', "Buat program studi baru terlebih dahulu!");
            return redirect(route('faculties.index'));
        }

        return $next($request);
    }
}
