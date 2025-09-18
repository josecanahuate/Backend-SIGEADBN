<?php

namespace App\Modules\Departamento\Services;

use App\Modules\Departamento\Repositories\DepartamentoRepository;

class DepartamentoService
{
    protected $repository;

    public function __construct(DepartamentoRepository $repository)
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
        $departamento = $this->repository->findById($id);
        return $this->repository->update($departamento, $data);
    }
}
