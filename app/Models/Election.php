<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'period',
        'total_voters',
        'voted_voters',
        'unvoted_voters',
        'total_candidates',
        'election_winner',
        'chairman',
        'vice_chairman',
        'chairman_photo',
        'vice_chairman_photo',
        'archived',
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class)->orderBy('candidate_number');
    }

    public function voters()
    {
        return $this->hasMany(Voter::class)->orderBy('nim');
    }

    public function votedVoters()
    {
        return $this->hasMany(Voter::class)->where('voted', 1);
    }

    public function unvotedVoters()
    {
        return $this->hasMany(Voter::class)->where('voted', 0);
    }

    public function votings()
    {
        return $this->hasMany(Voting::class);
    }
}
