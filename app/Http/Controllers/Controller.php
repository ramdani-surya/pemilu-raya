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
        $election_id = getRunningElection()->id;
        $data['bem'] = getRunningCandidates($election_id,1);
        $data['bpm'] = getRunningCandidates($election_id,2);

        return view('index', $data);
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

        $data['date'] = getActiveElection()->running_date;

        return view('coming_soon',$data);
    }

    public function closed()
    {
        if (getRunningElection() || getActiveElection())
            return redirect('/');

        return view('closed');
    }
}
