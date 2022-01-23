<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateType extends Model
{
    use HasFactory;

    protected $table = "candidate_types";

    protected $fillable = [
        'election_id', 'name', 'slug'
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
    
    public function election()
    {
        return $this->belongsTo(Election::class);
    }
}
