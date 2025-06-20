<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoolAthlete extends Model
{
    use HasFactory;

    protected $table = 'pool_athletes';

    protected $fillable = ['pool_id', 'athlete_id'];

    public function pool()
    {
        return $this->belongsTo(Pool::class);
    }

    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }
}
