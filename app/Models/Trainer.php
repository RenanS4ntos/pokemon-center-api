<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Trainer extends User
{
    use SoftDeletes;

    protected $table = 'trainers';

    public function pokemons()
    {
        return $this->hasMany(Pokemon::class);
    }
}