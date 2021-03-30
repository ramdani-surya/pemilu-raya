<?php

use App\Models\Election;

function votersPercentage(Election $election, $voted=1)
{
    $totalVoters   = count($election->voters);
    $votedVoters   = count($election->votedVoters);
    $unvotedVoters = count($election->unvotedVoters);

    $vote = $voted ? $votedVoters  : $unvotedVoters;

    try {
        $percentage = round(($vote / $totalVoters) * 100, 2);
    } catch (\Throwable $th) {
        $percentage = 0;
    }

    return  "$percentage%";
}
