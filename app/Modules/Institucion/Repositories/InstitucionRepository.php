<?php

namespace App\Modules\Institucion\Repositories;

use App\Modules\Institucion\Models\Institucion;


class InstitucionRepository
{
    public function getAll()
    {
        $institucion = Institucion::select('id', 'razon_social', 'nombre_institucion', 'rnc',
        'direccion_1', 'direccion_2', 'tel_1', 'email', 'encargado', 'clase_empresa')->get();

        return $institucion;
    }

    public function findById($id)
    {
        return Institucion::findOrFail($id);
    }

    public function existsByName(string $nombre): bool
    {
        return Institucion::where('nombre_institucion', $nombre)->exists();
    }


    public function create(array $data)
    {
        return Institucion::create($data);
    }

    public function update(Institucion $institucion, array $data)
    {
        $institucion->update($data);
        return $institucion;
    }
}
