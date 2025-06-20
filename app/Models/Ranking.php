<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;

    protected $fillable = ['competition_id', 'athlete_id', 'poids', 'rang'];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }
}
