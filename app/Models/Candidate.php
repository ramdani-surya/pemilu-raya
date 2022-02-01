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

    public function ftiVotings()
    {
        $fti = Faculty::where('slug', 'fakultas-teknik-informatika')->first();
        return $this->hasMany(Voting::class)->where('faculty_id', $fti->id);
    }

    public function febVotings()
    {
        $feb = Faculty::where('slug', 'fakultas-ekonomi-dan-bisnis')->first();
        return $this->hasMany(Voting::class)->where('faculty_id', $feb->id);
    }

    public function fisipVotings()
    {
        $fisip = Faculty::where('slug', 'fakultas-ilmu-sosial-dan-ilmu-politik')->first();
        return $this->hasMany(Voting::class)->where('faculty_id', $fisip->id);
    }

    public function fkipVotings()
    {
        $fkip = Faculty::where('slug', 'fakultas-keguruan-dan-ilmu-pendidikan')->first();
        return $this->hasMany(Voting::class)->where('faculty_id', $fkip->id);
    }

    public function fibVotings()
    {
        $fib = Faculty::where('slug', 'fakultas-ilmu-budaya')->first();
        return $this->hasMany(Voting::class)->where('faculty_id', $fib->id);
    }

    public function fikVotings()
    {
        $fik = Faculty::where('slug', 'fakultas-ilmu-kesehatan')->first();
        return $this->hasMany(Voting::class)->where('faculty_id', $fik->id);
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
