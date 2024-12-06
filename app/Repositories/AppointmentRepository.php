<?php

namespace App\Repositories;

use App\Models\Appointment;

class AppointmentRepository
{
    protected $appointment;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    public function getAll()
    {
        return $this->appointment->all();
    }

    public function findById($id)
    {
        return $this->appointment->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->appointment->create($data);
    }

    public function update($id, array $data)
    {
        $appointment = $this->findById($id);
        $appointment->update($data);
        return $appointment;
    }

    public function delete($id)
    {
        $appointment = $this->findById($id);
        $appointment->delete();
        return $appointment;
    }
}