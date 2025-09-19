<?php

namespace App\Modules\Departamentos\Services;

use App\Modules\Departamentos\Repositories\DepartamentoRepository;
use Exception;

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
        // Lógica de negocio extra
        if ($this->repository->existsByName($data['nombre_depto'])) {
            throw new Exception("Ya existe un departamento con ese nombre");
        }

        return $this->repository->create($data);
    }

    public function update($id, array $data)
    {
        $departamento = $this->repository->findById($id);
        return $this->repository->update($departamento, $data);
    }
}
