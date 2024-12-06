<?php

namespace App\Repositories;

use App\Models\Trainer;

class TrainerRepository
{
    protected $trainer;

    public function __construct(Trainer $trainer)
    {
        $this->trainer = $trainer;
    }

    public function getAll()
    {
        return $this->trainer->all();
    }

    public function findById($id)
    {
        return $this->trainer->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->trainer->create($data);
    }

    public function update($id, array $data)
    {
        $trainer = $this->findById($id);
        $trainer->update($data);
        return $trainer;
    }

    public function delete($id)
    {
        $trainer = $this->findById($id);
        $trainer->delete();
        return $trainer;
    }
}