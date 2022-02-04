<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\Election;
use Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $election_id = getRunningElection()->id;
        $data['bem'] = getRunningCandidates($election_id,1) ?: null;
        $data['bpm'] = getRunningCandidates($election_id,2) ?: null;
        $data['bem_voted'] = getVoted($election_id,Auth::user()->id,1) ?: null;
        $data['bpm_voted'] = getVoted($election_id,Auth::user()->id,2) ?: null ?: null;

        return view('index', $data);
    }

    public function result()
    {

        $election = Election::where('archived', '0')->first();
        $electionModel = Election::all();
        if (isset($election) || $electionModel->isEmpty()) {
            
            Alert::info('Info', "Pemilu belum di arsipkan!");
            return redirect()->route('elections.index');
        } else {

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
            
            return view('result', $data);
        }
    }

    public function result_filter($candidate_type) 
    {
        $election = Election::where('archived', '0')->first();
        $electionModel = Election::all();
        if (isset($election) || $electionModel->isEmpty()) {
            
            Alert::info('Info', "Pemilu belum di arsipkan!");
            return redirect()->route('elections.index');
        } else {
              
            if ($candidate_type == 'bpm') {
                $data = $this->getBpmFacultyVotingData();

                array_pop($data['bpmCandidates']);
            
                $data['ftiCandidateVotings'];

                $data['febCandidateVotings'];

                $data['fisipCandidateVotings'];

                $data['fkipCandidateVotings'];

                $data['fibCandidateVotings'];

                $data['fikCandidateVotings'];

                return view('result_bpm_faculty', $data);
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

                return view('result_bem_faculty', $data);
            }
        }
    }

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
