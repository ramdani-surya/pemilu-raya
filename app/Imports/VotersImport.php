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
            'nim'         => $row[0],
            'name'        => $row[1],
            'token'       => generateToken(),
        ]);
    }
}
