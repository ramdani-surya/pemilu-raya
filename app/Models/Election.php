<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CandidateType;
use Alert;

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
        'status',
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class)->orderBy('candidate_number');
    }

    public function faculties()
    {
        return $this->hasMany(Faculty::class);
    }

    public function studyPrograms()
    {
        return $this->hasMany(StudyProgram::class);
    }

    public function candidateTypeData()
    {
        return $this->hasMany(CandidateType::class);
    }

    public function candidateTypes()
    {
        return $this->hasMany(CandidateType::class)->has('candidates');
    }

    public function bpm() 
    {
            $candidateTypeBpm = CandidateType::where('name', 'BPM')->first() ?: 0;
            $candidate_id = $candidateTypeBpm ? $candidateTypeBpm->id :0 ;
            return $this->hasMany(Candidate::class)->orderBy('candidate_number')->where('candidate_type_id', $candidate_id);
            
    }
        
    public function bem()
    {
        $candidateTypeBem = CandidateType::where('name', 'BEM')->first() ?: 0;
        $candidate_id = $candidateTypeBem ? $candidateTypeBem->id :0 ;
        return $this->hasMany(Candidate::class)->orderBy('candidate_number')->where('candidate_type_id', $candidate_id);
    }

    public function voters()
    {
        return $this->hasMany(Voter::class)->orderBy('nim');
    }


    public function allVoted()
    {
        return $this->hasMany(Voter::class)->where('voted', 1);
    }

    public function allUnvoted()
    {
        return $this->hasMany(Voter::class)->where('voted', 0);
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

    public function bemCandidates()
    {
        return $this->hasMany(Candidate::class)->where('candidate_type_id', 1);
    }

    public function bpmCandidates()
    {
        return $this->hasMany(Candidate::class)->where('candidate_type_id', 2);
    }

    public function votings()
    {
        return $this->hasMany(Voting::class);
    }
}
