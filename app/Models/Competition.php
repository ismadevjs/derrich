<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'date', 'salle_id', 'tapis_id', 'arbitre_id'];

    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }

    public function tapis()
    {
        return $this->belongsTo(Tapis::class);
    }

    public function arbitre()
    {
        return $this->belongsTo(Arbitre::class);
    }

    public function combats()
    {
        return $this->hasMany(Combat::class);
    }

    public function pools()
    {
        return $this->hasMany(Pool::class);
    }

    public function rankings()
    {
        return $this->hasMany(Ranking::class);
    }
}
