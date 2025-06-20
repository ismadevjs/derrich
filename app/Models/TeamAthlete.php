<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamAthlete extends Model
{
    use HasFactory;

    protected $table = 'team_athletes';

    protected $fillable = ['team_id', 'athlete_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }
}
