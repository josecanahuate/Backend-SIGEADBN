<?php

namespace App\Modules\Departamentos\Repositories;

use App\Modules\Departamentos\Models\Departamento;


class DepartamentoRepository
{
    public function getAll()
    {
        $departamento = Departamento::select('id', 'nombre_depto')->latest()->paginate(5);
        return $departamento;
    }

    public function findById($id)
    {
        return Departamento::findOrFail($id);
    }

     public function existsByName(string $nombre): bool
    {
        return Departamento::where('nombre_depto', $nombre)->exists();
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
