<?php

namespace App\Modules\Departamento\Repositories;

use App\Modules\Departamento\Models\Departamento;


class DepartamentoRepository
{
    public function getAll()
    {
        $departamento = Departamento::select('id', 'razon_social', 'nombre_depto', 'tel')->paginate(10);
        return $departamento;
    }

    public function findById($id)
    {
        return Departamento::findOrFail($id);
    }

    public function create(array $data)
    {
        return Departamento::create($data);
    }

    public function update(Departamento $departamento, array $data)
    {
        $departamento->update($data);
        return $departamento;
    }
}
