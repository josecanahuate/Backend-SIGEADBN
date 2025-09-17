<?php

namespace App\Modules\Institucion\Repositories;

use App\Modules\Institucion\Resources\InstitucionResource;
use App\Modules\Institucion\Models\Institucion;


class InstitucionRepository
{
    public function getAll()
    {
        return Institucion::all();

        

        // REVISAR NO FUNCIONA
        //return InstitucionResource::collection(Institucion::query()->orderBy('id', 'desc')->get());
    }

    public function findById($id)
    {
        return Institucion::findOrFail($id);
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
