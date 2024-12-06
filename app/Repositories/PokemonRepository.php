<?php

namespace App\Repositories;

use App\Models\Pokemon;

class PokemonRepository
{
    protected $pokemon;

    public function __construct(Pokemon $pokemon)
    {
        $this->pokemon = $pokemon;
    }

    public function getAll()
    {
        return $this->pokemon->all();
    }

    public function findById($id)
    {
        return $this->pokemon->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->pokemon->create($data);
    }

    public function update($id, array $data)
    {
        $pokemon = $this->findById($id);
        $pokemon->update($data);
        return $pokemon;
    }

    public function delete($id)
    {
        $pokemon = $this->findById($id);
        $pokemon->delete();
        return $pokemon;
    }
}