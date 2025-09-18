<?php

namespace App\Modules\Empleados\Repositories;

use App\Modules\Empleados\Models\Empleado;


class EmpleadoRepository
{
    public function getAll()
    {
        $empleado = Empleado::select('nombres', 'usuario_empleado', 'departamento_id', 'estatus_empleado')->paginate(5);
        return $empleado;
    }

    public function findById($id)
    {
        return Empleado::findOrFail($id);
    }


    public function create(array $data)
    {
        return Empleado::create($data);
    }

    public function update(Empleado $empleado, array $data)
    {
        $empleado->update($data);
        return $empleado;
    }
}
