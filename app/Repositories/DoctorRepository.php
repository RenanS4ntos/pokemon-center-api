<?php

namespace App\Repositories;

use App\Models\Doctor;

class DoctorRepository
{
    protected $doctor;

    public function __construct(Doctor $doctor)
    {
        $this->doctor = $doctor;
    }

    public function getAll()
    {
        return $this->doctor->all();
    }

    public function findById($id)
    {
        return $this->doctor->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->doctor->create($data);
    }
}