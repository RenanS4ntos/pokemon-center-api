<?php

namespace App\Services;

use App\Repositories\TrainerRepository;

class TrainerService
{
  protected $trainerRepository;

  public function __construct(TrainerRepository $trainerRepository)
  {
    $this->trainerRepository = $trainerRepository;
  }

  public function getAll()
  {
    return $this->trainerRepository->getAll();
  }

  public function findById($id)
  {
    return $this->trainerRepository->findById($id);
  }

  public function create(array $data)
  {
    return $this->trainerRepository->store($data);
  }

  public function update($id, array $data)
  {
    return $this->trainerRepository->update($id, $data);
  }

  public function delete($id)
  {
    return $this->trainerRepository->delete($id);
  }
}