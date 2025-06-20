<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arbitre extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo', 'nom', 'prenom', 'pays', 'wilaya', 'club_id', 'groupage', 'niveau',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function competitions()
    {
        return $this->hasMany(Competition::class);
    }
}
