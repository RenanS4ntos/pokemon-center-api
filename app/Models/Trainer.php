<?php

namespace App\Models;

class Trainer extends User
{
    public function pokemons()
    {
        return $this->hasMany(Pokemon::class);
    }
}