<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $candidates = getRunningElection()->candidates;

        return view('index', compact('candidates'));
    }

    public function hasVoted()
    {
        return view('has_voted');
    }

    public function comingSoon()
    {
        if (getRunningElection()) {
            return redirect('/');
        }
        elseif (!getRunningElection() && !getActiveElection()) {
            return redirect(route('closed'));
        }

        return view('coming_soon');
    }

    public function closed()
    {
        if (getRunningElection())
            return redirect('/');

        return view('closed');
    }
}
