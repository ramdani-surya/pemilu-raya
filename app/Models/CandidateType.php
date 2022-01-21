<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateType extends Model
{
    use HasFactory;

    protected $table = "candidate_types";

    protected $fillable = [
        'name'
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
}
