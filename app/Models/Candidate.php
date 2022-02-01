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

    public function ftiVotings()
    {
        $fti = Faculty::where('slug', 'fakultas-teknologi-informasi')->first() ?: 0;
        $fti_id = $fti ? $fti->id :0 ;

        return $this->hasMany(Voting::class)->where('faculty_id', $fti_id);
    }

    public function febVotings()
    {
        $feb = Faculty::where('slug', 'fakultas-ekonomi-dan-bisnis')->first() ?: 0;
        $feb_id = $feb ? $feb->id :0 ;

        return $this->hasMany(Voting::class)->where('faculty_id', $feb_id);
    }

    public function fisipVotings()
    {
        $fisip = Faculty::where('slug', 'fakultas-ilmu-sosial-dan-ilmu-politik')->first() ?: 0;
        $fisip_id = $fisip ? $fisip->id :0 ;
        return $this->hasMany(Voting::class)->where('faculty_id', $fisip_id);
    }

    public function fkipVotings()
    {
        $fkip = Faculty::where('slug', 'fakultas-keguruan-dan-ilmu-pendidikan')->first() ?: 0;
        $fkip_id = $fkip ? $fkip->id :0 ;
        return $this->hasMany(Voting::class)->where('faculty_id', $fkip_id);
    }

    public function fibVotings()
    {
        $fib = Faculty::where('slug', 'fakultas-ilmu-budaya')->first() ?: 0;
        $fib_id = $fib ? $fib->id :0 ;
        return $this->hasMany(Voting::class)->where('faculty_id', $fib_id);
    }

    public function fikVotings()
    {
        $fik = Faculty::where('slug', 'fakultas-ilmu-kesehatan')->first() ?: 0;
        $fik_id = $fik ? $fik->id :0 ;
        return $this->hasMany(Voting::class)->where('faculty_id', $fik_id);
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
