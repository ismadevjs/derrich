<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'club_id', 'coach_id'];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function athletes()
    {
        return $this->belongsToMany(Athlete::class, 'team_athletes');
    }
}
