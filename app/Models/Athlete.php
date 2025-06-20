<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo', 'nom', 'prenom', 'date_naissance', 'age', 'pays', 'wilaya',
        'club_id', 'poids', 'categorie', 'rapport_medical_pdf', 'cardiovasculaire',
        'groupage', 'medical_status',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function combatsAsAthlete1()
    {
        return $this->hasMany(Combat::class, 'athlete1_id');
    }

    public function combatsAsAthlete2()
    {
        return $this->hasMany(Combat::class, 'athlete2_id');
    }

    public function combatsWon()
    {
        return $this->hasMany(Combat::class, 'vainqueur_id');
    }

    public function rankings()
    {
        return $this->hasMany(Ranking::class);
    }

    public function pools()
    {
        return $this->belongsToMany(Pool::class, 'pool_athletes');
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_athletes');
    }
}
