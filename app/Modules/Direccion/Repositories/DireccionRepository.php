<?php

namespace App\Modules\Direccion\Repositories;

use App\Modules\Direccion\Models\Direccion;


class DireccionRepository
{
    public function getAll()
    {
        $direccion = Direccion::select('id', 'razon_social', 'nombre_direccion', 'rnc',
        'direccion_1', 'direccion_2', 'tel_1', 'email', 'encargado')->get();

        return $direccion;
    }

    public function findById($id)
    {
        return Direccion::findOrFail($id);
    }

    public function create(array $data)
    {
        return Direccion::create($data);
    }

    public function update(Direccion $direccion, array $data)
    {
        $direccion->update($data);
        return $direccion;
    }
}
