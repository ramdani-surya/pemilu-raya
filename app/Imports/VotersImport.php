<?php

namespace App\Imports;

use App\Models\Voter;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class VotersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Voter([
            'user_id'     => Auth::id(),
            'election_id' => getActiveElection()->id,
            'nim'         => substr($row[1], 0, 10),
            'name'        => "$row[2] $row[3]",
            'token'       => generateToken(),
            'email'       => $row[1],
        ]);
    }
}
