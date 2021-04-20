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
    public function dashboard(Election $election, Candidate $candidates)
    {
        $jumlah_kandidat = Candidate::All();
        $candidate = $jumlah_kandidat->count();

       
        $jumlah_voter = Voter::All();
        $voter = $jumlah_voter->count();

        $not_voted = votersPercentage($election, 0);
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
         ->labels(['Kandidat 1', 'Kandidat 2', 'Kandidat 3', 'Belum Memilih'])
         ->datasets([
             [
                 "label" => "Suara",
                 'backgroundColor' => ['#fff', 'rgba(54, 162, 235, 0.2)', '#acacac'],
                 'data' => [$jumlahAdmin,12,200,$not_voted]
             ],
             
             
            
         ])
         ->options([]);

       

        return view('admin.dashboard.data', compact('candidate','voter','voted','not_voted','chartjs'));
    }
}
