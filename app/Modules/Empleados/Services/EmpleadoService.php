<?php

namespace App\Modules\Empleados\Services;

use App\Modules\Empleados\Repositories\EmpleadoRepository;

class EmpleadoService
{
    protected $repository;

    public function __construct(EmpleadoRepository $repository)
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
        $empleado = $this->repository->findById($id);
        return $this->repository->update($empleado, $data);
    }
}
