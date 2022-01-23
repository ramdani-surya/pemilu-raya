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
        'running_date',
        'running',
        'archived',
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class)->orderBy('candidate_number');
    }

    public function candidate_types()
    {
        return $this->belongsTo(CandidateType::class);
    }

    public function bpm() 
    {
        $candidateTypeBpm = CandidateType::where('name', 'BPM')->first();
        return $this->hasMany(Candidate::class)->orderBy('candidate_number')->where('candidate_type_id', $candidateTypeBpm->id);
    }

    public function bem()
    {
        $candidateTypeBem = CandidateType::where('name', 'BEM')->first();
        return $this->hasMany(Candidate::class)->orderBy('candidate_number')->where('candidate_type_id', $candidateTypeBem->id);
    }

    public function voters()
    {
        return $this->hasMany(Voter::class)->orderBy('nim');
    }

    public function bpmVotedVoters()
    {
        return $this->hasMany(Voter::class)->where('bpm_voted', 1);
    }

    public function bpmUnvotedVoters()
    {
        return $this->hasMany(Voter::class)->where('bpm_voted', 0);
    }

    public function bemVotedVoters()
    {
        return $this->hasMany(Voter::class)->where('bem_voted', 1);
    }

    public function bemUnvotedVoters()
    {
        return $this->hasMany(Voter::class)->where('bem_voted', 0);
    }

    public function votings()
    {
        return $this->hasMany(Voting::class);
    }
}
