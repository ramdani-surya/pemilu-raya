<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Voter;

class MainController extends Controller
{
    public function dashboard()
    {
        $jumlah_kandidat = Candidate::All();
        $candidate = $jumlah_kandidat->count();

        $jumlah_voter = Voter::All();
        $voter = $jumlah_voter->count();

        $belum_memilih = Voter::where('voted', '0')->get();
        $not_voted = $belum_memilih->count();

        $sudah_memilih = Voter::where('voted', '1')->get();
        $voted = $sudah_memilih->count();

        return view('admin.dashboard.data', compact('candidate','voter','voted','not_voted'));
    }
}
