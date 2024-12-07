<?php

namespace App\Services;

use App\Repositories\MedicalRecordRepository;

class MedicalRecordService
{
  protected $medicalRecordRepository;

  public function __construct(MedicalRecordRepository $medicalRecordRepository)
  {
    $this->medicalRecordRepository = $medicalRecordRepository;
  }

  public function getAll()
  {
    return $this->medicalRecordRepository->getAll();
  }

  public function findById($id)
  {
    return $this->medicalRecordRepository->findById($id);
  }

  public function create(array $data)
  {
    return $this->medicalRecordRepository->create($data);
  }

  public function update($id, array $data)
  {
    return $this->medicalRecordRepository->update($id, $data);
  }

  public function delete($id)
  {
    return $this->medicalRecordRepository->delete($id);
  }
}