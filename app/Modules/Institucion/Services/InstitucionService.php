<?php

namespace App\Modules\Institucion\Services;

use App\Modules\Institucion\Repositories\InstitucionRepository;

class InstitucionService
{
    protected $repository;

    public function __construct(InstitucionRepository $repository)
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
        $institucion = $this->repository->findById($id);
        return $this->repository->update($institucion, $data);
    }
}
