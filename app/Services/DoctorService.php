<?php

namespace App\Services;

use App\Repositories\DoctorRepository;

class DoctorService
{
  protected $doctorRepository;

  public function __construct(DoctorRepository $doctorRepository)
  {
    $this->doctorRepository = $doctorRepository;
  }

  public function getAll()
  {
    return $this->doctorRepository->getAll();
  }

  public function findById($id)
  {
    return $this->doctorRepository->findById($id);
  }

  public function create(array $data)
  {
    return $this->doctorRepository->create($data);
  }

  public function update($id, array $data)
  {
    return $this->doctorRepository->update($id, $data);
  }

  public function delete($id)
  {
    return $this->doctorRepository->delete($id);
  }
}