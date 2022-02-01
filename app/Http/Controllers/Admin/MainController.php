<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voter;
use App\Models\Faculty;

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
        
        $data['votergang'] = Voter::with(['election.candidateTypes'])->get();
        return view('admin.dashboard.data', $data);
    }

    public function show($candidate_type) {
       
        if ($candidate_type == 'bpm') {
            $data = $this->getBpmFacultyVotingData();

            array_pop($data['bpmCandidates']);
        
            $data['ftiCandidateVotings'];

            $data['febCandidateVotings'];

            $data['fisipCandidateVotings'];

            $data['fkipCandidateVotings'];

            $data['fibCandidateVotings'];

            $data['fikCandidateVotings'];

            return view('admin.dashboard.bpm_faculty', $data);
        }

        if ($candidate_type == 'bem') {

            $data = $this->getBemFacultyVotingData();
            array_pop($data['bemCandidates']);
        
            $data['ftiCandidateVotings'];

            $data['febCandidateVotings'];

            $data['fisipCandidateVotings'];

            $data['fkipCandidateVotings'];

            $data['fibCandidateVotings'];

            $data['fikCandidateVotings'];

            $data['candidate_type'] = $candidate_type;

            return view('admin.dashboard.bem_faculty', $data);
        }

        // if($data['ftiCandidateVotings'][0] == 0 && $data['ftiCandidateVotings'][1] == 0) {
        //     $data['ftiCandidateVotings'];
        // } else {
        //     $data['ftiCandidateVotings']);
        // }

        // if($data['febCandidateVotings'][0] == 0 && $data['febCandidateVotings'][1] == 0) {
        //     $data['febCandidateVotings'];
        // } else {
        //     $data['febCandidateVotings']);
        // }

        // if($data['fisipCandidateVotings'][0] == 0 && $data['fisipCandidateVotings'][1] == 0) {
        //     $data['fisipCandidateVotings'];
        // } else {
        //     $data['fisipCandidateVotings'];
        // }

        // if($data['fkipCandidateVotings'][0] == 0 && $data['fkipCandidateVotings'][1] == 0) {
        //     $data['fkipCandidateVotings'];
        // } else {
        //     array_pop($data['fkipCandidateVotings']);
        // }

        // if($data['fibCandidateVotings'][0] == 0 && $data['fibCandidateVotings'][1] == 0) {
        //     $data['fibCandidateVotings'];
        // } else {
        //     array_pop($data['fibCandidateVotings']);
        // }

        // if($data['fikCandidateVotings'][0] == 0 && $data['fikCandidateVotings'][1] == 0) {
        //     $data['fikCandidateVotings'];
        // } else {
        //     array_pop($data['fikCandidateVotings']);
        // }
       
        
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
            'total_candidate' => [
                'bem' => count(getActiveElection()->bemCandidates),
                'bpm' => count(getActiveElection()->bpmCandidates),
            ]
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

    private function getBpmFacultyVotingData()
    {
        
        $bpmCandidates = [];

        $ftiCandidateVotings = [];
        $febCandidateVotings = [];
        $fisipCandidateVotings = [];
        $fkipCandidateVotings = [];
        $fibCandidateVotings = [];
        $fikCandidateVotings = [];

        if (getActiveElection()) {

             foreach (getActiveElection()->bpm as $candidate) {
                $bpmCandidates[] = "$candidate->chairman_name";
                $ftiCandidateVotings[] = count($candidate->ftiVotings);
                $febCandidateVotings[] = count($candidate->febVotings);
                $fisipCandidateVotings[] = count($candidate->fisipVotings);
                $fkipCandidateVotings[] = count($candidate->fkipVotings);
                $fibCandidateVotings[] = count($candidate->fibVotings);
                $fikCandidateVotings[] = count($candidate->fikVotings);
            }

            $bpmCandidates[] = 'Belum Memilih';
            $bpmCandidateVotings[] = count(getActiveElection()->bpmUnvotedVoters);

        }

        $votingData['bpmCandidates'] = $bpmCandidates;
        $votingData['ftiCandidateVotings'] = $ftiCandidateVotings;
        $votingData['febCandidateVotings'] = $febCandidateVotings;
        $votingData['fisipCandidateVotings'] = $fisipCandidateVotings;
        $votingData['fkipCandidateVotings'] = $fkipCandidateVotings;
        $votingData['fibCandidateVotings'] = $fibCandidateVotings;
        $votingData['fikCandidateVotings'] = $fikCandidateVotings;
        return $votingData;
    }
    
    private function getBemFacultyVotingData()
    {
        
        $bemCandidates = [];

        $ftiCandidateVotings = [];
        $febCandidateVotings = [];
        $fisipCandidateVotings = [];
        $fkipCandidateVotings = [];
        $fibCandidateVotings = [];
        $fikCandidateVotings = [];

        if (getActiveElection()) {

            
            foreach (getActiveElection()->bem as $candidate) {
                $bemCandidates[] = "$candidate->chairman_name";
                $ftiCandidateVotings[] = count($candidate->ftiVotings);
                $febCandidateVotings[] = count($candidate->febVotings);
                $fisipCandidateVotings[] = count($candidate->fisipVotings);
                $fkipCandidateVotings[] = count($candidate->fkipVotings);
                $fibCandidateVotings[] = count($candidate->fibVotings);
                $fikCandidateVotings[] = count($candidate->fikVotings);
            }
            
            $bemCandidates[] = 'Belum Memilih';
            $bemCandidateVotings[] = count(getActiveElection()->bemUnvotedVoters);
            
        }
        
        $votingData['bemCandidates'] = $bemCandidates;
        $votingData['ftiCandidateVotings'] = $ftiCandidateVotings;
        $votingData['febCandidateVotings'] = $febCandidateVotings;
        $votingData['fisipCandidateVotings'] = $fisipCandidateVotings;
        $votingData['fkipCandidateVotings'] = $fkipCandidateVotings;
        $votingData['fibCandidateVotings'] = $fibCandidateVotings;
        $votingData['fikCandidateVotings'] = $fikCandidateVotings;
        return $votingData;
    }
}
