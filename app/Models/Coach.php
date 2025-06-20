<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $table = 'coachs';

    protected $fillable = ['nom', 'prenom', 'pays', 'wilaya', 'club_id'];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
