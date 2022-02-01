<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $table = "faculties";

    protected $fillable = [
        'election_id', 'name', 'slug'
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class)->orderBy('candidate_number');
    }

    public function votings()
    {
        return $this->hasMany(Voting::class);
    }

    public function bem()
    {
        $candidateTypeBem = CandidateType::where('name', 'BEM')->first();
        return $this->hasMany(Candidate::class)->orderBy('candidate_number')->where('candidate_type_id', $candidateTypeBem->id);
    }
}
