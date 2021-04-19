<?php

use App\Models\Election;
use Illuminate\Support\Str;

function emailStmik($nim)
{
    return "$nim@mhs.stmik-sumedang.ac.id";
}

function generateToken()
{
    return Str::random(6);
}

function getActiveElection()
{
    return Election::where('archived', 0)->first();
}

function getRunningElection()
{
    return Election::where('running', 1)->first();
}

function tglIndo($date)
{
    $bln  = config('constant.bulan');
    $date = date('d-m-Y', strtotime($date));
    $date = explode('-', $date);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $date[0] . ' ' . $bln[(int) $date[1]] . ' ' . $date[2];
}

function votersPercentage(Election $election, $voted=1)
{
    $totalVoters   = $election->total_voters ?? count($election->voters);
    $votedVoters   = $election->voted_voters ?? count($election->votedVoters);
    $unvotedVoters = $election->unvoted_voters ?? count($election->unvotedVoters);

    $vote = $voted ? $votedVoters  : $unvotedVoters;

    try {
        $percentage = round(($vote / $totalVoters) * 100, 2);
    } catch (\Throwable $th) {
        $percentage = 0;
    }

    return  "$percentage%";
}
