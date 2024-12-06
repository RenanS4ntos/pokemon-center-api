<?php

namespace App\Repositories;

use App\Models\MedicalRecord;

class MedicalRecordRepository
{
    protected $medicalRecord;

    public function __construct(MedicalRecord $medicalRecord)
    {
        $this->medicalRecord = $medicalRecord;
    }

    public function getAll()
    {
        return $this->medicalRecord->all();
    }

    public function findById($id)
    {
        return $this->medicalRecord->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->medicalRecord->create($data);
    }

    public function update($id, array $data)
    {
        $medicalRecord = $this->findById($id);
        $medicalRecord->update($data);
        return $medicalRecord;
    }

    public function delete($id)
    {
        $medicalRecord = $this->findById($id);
        $medicalRecord->delete();
        return $medicalRecord;
    }
}