<?php

namespace App\Modules\Sucursal\Repositories;

use App\Modules\Sucursal\Models\Sucursal;


class SucursalRepository
{
    public function getAll()
    {
        $sucursal = Sucursal::select('id', 'razon_social', 'nombre_sucursal', 'rnc')->paginate(10);
        return $sucursal;
    }

    public function findById($id)
    {
        return Sucursal::findOrFail($id);
    }

    public function create(array $data)
    {
        return Sucursal::create($data);
    }

    public function update(Sucursal $sucursal, array $data)
    {
        $sucursal->update($data);
        return $sucursal;
    }
}
