<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function dashboard()
    {

        if (getActiveElection()) {
            $data = $this->getVotingData();
        } else {
            $data['candidates'] = [];
            $data['candidateVotings'] = [];
        }

        array_pop($data['candidates']);
        array_pop($data['candidateVotings']);

        return view('admin.dashboard.data', $data);
    }

    public function dashboardApi()
    {
        // set data buat widget
        $data = [
            'total_voter' => count(getActiveElection()->voters),
            'has_voted'   => [
                'total'      => count(getActiveElection()->votedVoters),
                'percentage' => votersPercentage(getActiveElection()),
            ],
            'unvoted' => [
                'total'      => count(getActiveElection()->unvotedVoters),
                'percentage' => votersPercentage(getActiveElection(), 0),
            ],
            'total_candidate' => count(getActiveElection()->candidates),
        ];

        $data['votings'] = $this->getVotingData()['candidateVotings'];

        return response()->json($data);
    }

    // set data buat chart
    private function getVotingData()
    {
        $candidates = [];
        $candidateVotings = [];

        if (getActiveElection()) {
            foreach (getActiveElection()->candidates as $candidate) {
                $candidates[] = "$candidate->chairman_name - $candidate->vice_chairman_name";
                $candidateVotings[] = count($candidate->votings);
            }

            $candidates[] = 'Belum Memilih';
            $candidateVotings[] = count(getActiveElection()->unvotedVoters);
        }

        $votingData['candidates'] = $candidates;
        $votingData['candidateVotings'] = $candidateVotings;

        return $votingData;
    }
}
