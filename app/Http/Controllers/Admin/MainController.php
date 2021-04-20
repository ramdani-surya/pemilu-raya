<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\Voter;
use App\Models\Voting;
use App\Models\User;
use DB;
use Carbon\Carbon;


class MainController extends Controller
{
    public function dashboard(Election $election)
    {
        $jumlah_kandidat = Candidate::All();
        $candidate = count(getActiveElection()->candidates);
        $candidates = Candidate::all();
        $not_voted = votersPercentage($election, 0);
        $candidateArray = [];
        $candidateVotings = [];

        foreach ($candidates as $dcandidate) {
            $candidateArray[] = "$dcandidate->chairman_name - $dcandidate->vice_chairman_name";
            $candidateVotings[] = count($dcandidate->votings);
        }
        $candidateArray[] = 'Belum Memilih';
        $candidateVotings[] = $not_voted;

       
        $jumlah_voter = Voter::All();
        $voter = $jumlah_voter->count();

        $voted = votersPercentage($election, 1);    

        $sudah_memilih = Voter::where('voted', '1')->get();

        $kandidat1 = Voting::where('candidate_id', '17')->get();
        $jumlah = $kandidat1->count();
        
        $user = User::where('role','admin')->get();
        $jumlahAdmin = $user->count();
        $chartjs = app()->chartjs
         ->name('barChartTest')
         ->type('bar')
         ->size(['width' => 400, 'height' => 200])
         ->labels($candidateArray)
         ->datasets([
             [
                 "label" => "Suara",
                 'backgroundColor' => ['#fff', 'rgba(54, 162, 235, 0.2)', '#acacac'],
                 'data' => $candidateVotings
             ],
             
             
            
         ])
         ->options([]);

       

        return view('admin.dashboard.data', compact('candidate','voter','voted','not_voted','chartjs'));
    }
}
