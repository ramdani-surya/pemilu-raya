<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'election_id',
        'candidate_type_id',
        'candidate_number',
        'chairman_name',
        'image',
        'program',
        'faculty_id',
        'study_program_id'
    ];

    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    public function votings()
    {
        return $this->hasMany(Voting::class);
    }

    public function faculties()
    {
        return $this->hasMany(Faculty::class);
    }

    public function studyPrograms()
    {
        return $this->hasMany(StudyProgram::class);
    }

    public function candidateTypes()
    {
        return $this->belongsTo(CandidateType::class, 'candidate_type_id');
    }

    
}
