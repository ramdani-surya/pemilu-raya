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
            'nim'         => "$row[2]",
            'name'        => ucwords($row[0]),
            'token'       => generateToken(),
            'email'       => $row[1],
            'faculty_id'  => $row[5],
            'study_program_id'  => $row[3],
            'semester'    => $row[4]
        ]);
    }
}
