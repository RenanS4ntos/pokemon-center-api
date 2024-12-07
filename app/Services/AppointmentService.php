<?php

namespace App\Services;

use App\Repositories\AppointmentRepository;

class AppointmentService
{
  protected $appointmentRepository;

  public function __construct(AppointmentRepository $appointmentRepository)
  {
    $this->appointmentRepository = $appointmentRepository;
  }

  public function getAll()
  {
    return $this->appointmentRepository->getAll();
  }

  public function findById($id)
  {
    return $this->appointmentRepository->findById($id);
  }

  public function create(array $data)
  {
    return $this->appointmentRepository->create($data);
  }

  public function update($id, array $data)
  {
    return $this->appointmentRepository->update($id, $data);
  }

  public function delete($id)
  {
    return $this->appointmentRepository->delete($id);
  }
}