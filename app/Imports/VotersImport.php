<?php

namespace App\Imports;

use App\Models\Voter;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

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
            'election_id' => $row[0],
            'nim'         => $row[1],
            'name'        => $row[2],
            'token'       => Str::random(6),
        ]);
    }
}
