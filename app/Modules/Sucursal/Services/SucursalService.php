<?php

namespace App\Modules\Sucursal\Services;

use App\Modules\Sucursal\Repositories\SucursalRepository;

class SucursalService
{
    protected $repository;

    public function __construct(SucursalRepository $repository)
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
        $sucursal = $this->repository->findById($id);
        return $this->repository->update($sucursal, $data);
    }
}
