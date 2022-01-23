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

function replaceEachChar($string, $replace)
{
    $chars = '';

    foreach (str_split($string) as $char) {
        $chars .= $replace;
    }

    return $chars;
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

function bpmVotersPercentage(Election $election, $voted=1, $label=true)
{
    // remionder have to change voted_voter etc to bpm or bem. votedvoters = voter total when archived
    $totalVoters   = $election->total_voters ?? count($election->voters);
    $bpmVotedVoters   = $election->voted_voters ?? count($election->bpmVotedVoters);
    $bpmUnvotedVoters = $election->unvoted_voters ?? count($election->bpmUnvotedVoters);

    $vote = $voted ? $bpmVotedVoters  : $bpmUnvotedVoters;

    try {
        $percentage = round(($vote / $totalVoters) * 100, 2);
    } catch (\Throwable $th) {
        $percentage = 0;
    }

    if ($label)
        $percentage = "$percentage%";

    return  $percentage;
}

function bemVotersPercentage(Election $election, $voted=1, $label=true)
{
    // remionder have to change voted_voter etc to bpm or bem. votedvoters = voter total when archived
    $totalVoters   = $election->total_voters ?? count($election->voters);
    $bemVotedVoters   = $election->voted_voters ?? count($election->bemVotedVoters);
    $bemUnvotedVoters = $election->unvoted_voters ?? count($election->bemUnvotedVoters);

    $vote = $voted ? $bemVotedVoters  : $bemUnvotedVoters;

    try {
        $percentage = round(($vote / $totalVoters) * 100, 2);
    } catch (\Throwable $th) {
        $percentage = 0;
    }

    if ($label)
        $percentage = "$percentage%";

    return  $percentage;
}
