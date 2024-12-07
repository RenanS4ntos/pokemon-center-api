<?php

namespace App\Services;

use App\Repositories\PokemonRepository;

class PokemonService
{
  protected $pokemonRepository;

  public function __construct(PokemonRepository $pokemonRepository)
  {
    $this->pokemonRepository = $pokemonRepository;
  }

  public function getAll()
  {
    return $this->pokemonRepository->getAll();
  }

  public function findById($id)
  {
    return $this->pokemonRepository->findById($id);
  }

  public function create(array $data)
  {
    return $this->pokemonRepository->create($data);
  }

  public function update($id, array $data)
  {
    return $this->pokemonRepository->update($id, $data);
  }

  public function delete($id)
  {
    return $this->pokemonRepository->delete($id);
  }
}