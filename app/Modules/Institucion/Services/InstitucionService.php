<?php

namespace App\Modules\Institucion\Services;

use App\Modules\Institucion\Repositories\InstitucionRepository;
use Exception;

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
        if ($this->repository->existsByName($data['nombre_institucion'])) {
            throw new Exception("Ya existe una institución con este nombre");
        }

        return $this->repository->create($data);
    }


    public function update($id, array $data)
    {
        $institucion = $this->repository->findById($id);
        return $this->repository->update($institucion, $data);
    }
}
