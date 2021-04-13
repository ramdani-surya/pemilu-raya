<?php

use App\Models\Election;

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
