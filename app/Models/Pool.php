<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    use HasFactory;

    protected $fillable = ['competition_id', 'nom'];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function athletes()
    {
        return $this->belongsToMany(Athlete::class, 'pool_athletes');
    }
}
