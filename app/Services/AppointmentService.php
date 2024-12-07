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
}