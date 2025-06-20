<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'adresse'];

    public function tapis()
    {
        return $this->hasMany(Tapis::class);
    }

    public function competitions()
    {
        return $this->hasMany(Competition::class);
    }
}
