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
        'faculty_id',
        'study_program_id',
        'candidate_number',
        'chairman_name',
        'image',
        'vision',
        'mission',
        'program',
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
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function studyPrograms()
    {
        return $this->belongsTo(StudyProgram::class, 'study_program_id');
    }

    public function candidateTypes()
    {
        return $this->belongsTo(CandidateType::class, 'candidate_type_id');
    }

    
}
