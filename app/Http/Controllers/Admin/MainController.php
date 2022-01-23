<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voter;

class MainController extends Controller
{
    public function dashboard()
    {

        if (getActiveElection()) {
            $data = $this->getVotingData();
        } else {
            $data['bpmCandidates'] = [];
            $data['bpmCandidateVotings'] = [];

            $data['bemCandidates'] = [];
            $data['bemCandidateVotings'] = [];
        }

        array_pop($data['bpmCandidates']);
        array_pop($data['bpmCandidateVotings']);

        array_pop($data['bemCandidates']);
        array_pop($data['bemCandidateVotings']);
        $data['votergang'] = Voter::with(['election.candidate_types'])->get();
        return view('admin.dashboard.data', $data);
    }

    public function dashboardApi()
    {
        // set data buat widget
        $data = [
            'total_voter' => count(getActiveElection()->voters),
            'bpm_has_voted'   => [
                'total'      => count(getActiveElection()->bpmVotedVoters),
                'percentage' => bpmVotersPercentage(getActiveElection()),
            ],
            'bpm_unvoted' => [
                'total'      => count(getActiveElection()->bpmUnvotedVoters),
                'percentage' => bpmVotersPercentage(getActiveElection(), 0),
            ],
            'bem_has_voted'   => [
                'total'      => count(getActiveElection()->bemVotedVoters),
                'percentage' => bemVotersPercentage(getActiveElection()),
            ],
            'bem_unvoted' => [
                'total'      => count(getActiveElection()->bemUnvotedVoters),
                'percentage' => bemVotersPercentage(getActiveElection(), 0),
            ],
            'total_candidate' => count(getActiveElection()->candidates),
        ];

        $data['bpmVotings'] = $this->getVotingData()['bpmCandidateVotings'];
        $data['bemVotings'] = $this->getVotingData()['bemCandidateVotings'];

        return response()->json($data);
    }

    // set data buat chart
    private function getVotingData()
    {
        $bpmCandidates = [];
        $bpmCandidateVotings = [];

        $bemCandidates = [];
        $bemCandidateVotings = [];

        if (getActiveElection()) {
            foreach (getActiveElection()->bpm as $candidate) {
                $bpmCandidates[] = "$candidate->chairman_name";
                $bpmCandidateVotings[] = count($candidate->votings);
            }

             foreach (getActiveElection()->bem as $candidate) {
                $bemCandidates[] = "$candidate->chairman_name";
                $bemCandidateVotings[] = count($candidate->votings);
            }

            $bpmCandidates[] = 'Belum Memilih';
            $bpmCandidateVotings[] = count(getActiveElection()->bpmUnvotedVoters);

            $bemCandidates[] = 'Belum Memilih';
            $bemCandidateVotings[] = count(getActiveElection()->bemUnvotedVoters);
        }

        $votingData['bpmCandidates'] = $bpmCandidates;
        $votingData['bpmCandidateVotings'] = $bpmCandidateVotings;

        $votingData['bemCandidates'] = $bemCandidates;
        $votingData['bemCandidateVotings'] = $bemCandidateVotings;
        return $votingData;
    }
}
