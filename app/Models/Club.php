<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'wilaya', 'adresse'];

    public function athletes()
    {
        return $this->hasMany(Athlete::class);
    }

    public function arbitres()
    {
        return $this->hasMany(Arbitre::class);
    }

    public function coachs()
    {
        return $this->hasMany(Coach::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
