<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    use HasFactory;

    protected $table = "study_programs";

    protected $fillable = [
        'faculty_id', 'name'
    ];

    public function faculties()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }
}