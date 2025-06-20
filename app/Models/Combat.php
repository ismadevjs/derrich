<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combat extends Model
{
    use HasFactory;

    protected $fillable = [
        'competition_id', 'athlete1_id', 'athlete2_id', 'vainqueur_id',
        'heure', 'resultat', 'performance', 'type_combat',
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function athlete1()
    {
        return $this->belongsTo(Athlete::class, 'athlete1_id');
    }

    public function athlete2()
    {
        return $this->belongsTo(Athlete::class, 'athlete2_id');
    }

    public function vainqueur()
    {
        return $this->belongsTo(Athlete::class, 'vainqueur_id');
    }
}
