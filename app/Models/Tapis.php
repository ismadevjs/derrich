<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tapis extends Model
{
    use HasFactory;

    protected $fillable = ['salle_id', 'nom'];

    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }

    public function competitions()
    {
        return $this->hasMany(Competition::class);
    }
}
