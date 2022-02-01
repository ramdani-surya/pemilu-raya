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
        if (filter_var($row[1], FILTER_VALIDATE_EMAIL)) {
            $cekVoters = Voter::where('email', $row[1])->first();
            if (!$cekVoters) {
                $cekVoters = Voter::where('nim', $row[2])->first();
                if (!$cekVoters) {
                    if ($row[2] != null) {
                        return new Voter([
                            'user_id'     => Auth::id(),
                            'election_id' => getActiveElection()->id,
                            'nim'         => "$row[2]",
                            'name'        => ucwords($row[0]),
                            'token'       => generateToken(),
                            'email'       => $row[1],
                            'faculty_id'  => $row[5],
                            'study_program_id'  => $row[3],
                            'semester'    => $row[4],
                            'creator'     => Auth::id()
                        ]);
                    }
                }
            }
        }
    }
}
