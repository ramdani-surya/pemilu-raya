<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'election_id',
        'candidate_number',
        'chairman_name',
        'vice_chairman_name',
        'image',
        'vision',
        'mission',
    ];

    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    public function votings()
    {
        return $this->hasMany(Voting::class);
    }
}
