<?php

namespace App\Modules\Sucursal\Repositories;

use App\Modules\Sucursal\Models\Sucursal;


class SucursalRepository
{
    public function getAll()
    {
        $sucursal = Sucursal::select('id', 'razon_social', 'nombre_sucursal', 'rnc',
        'direccion_1', 'direccion_2', 'tel_1', 'email', 'encargado', 'clase_empresa')->get();

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
