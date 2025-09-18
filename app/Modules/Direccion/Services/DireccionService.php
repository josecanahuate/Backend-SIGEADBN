<?php

namespace App\Modules\Direccion\Services;

use App\Modules\Direccion\Repositories\DireccionRepository;

class DireccionService
{
    protected $repository;

    public function __construct(DireccionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function find($id)
    {
        return $this->repository->findById($id);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update($id, array $data)
    {
        $direccion = $this->repository->findById($id);
        return $this->repository->update($direccion, $data);
    }
}
