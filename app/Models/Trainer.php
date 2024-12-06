<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainer extends Model
{
    use SoftDeletes;

    protected $table = 'trainers';

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function pokemons()
    {
        return $this->hasMany(Pokemon::class);
    }
}
