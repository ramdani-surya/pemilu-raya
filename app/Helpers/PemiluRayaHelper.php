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
