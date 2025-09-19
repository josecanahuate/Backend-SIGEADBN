<?php

namespace App\Modules\Empleados\Repositories;

use App\Modules\Empleados\Models\Empleado;


class EmpleadoRepository
{
    public function getAll()
    {
        //MOSTRAR SOLO 2 PARTES DEL NOMBRE -> HACERLO EN EL FRONTEND
        $empleado = Empleado::select('nombres', 'usuario_empleado', 'institucion_id', 'departamento_id', 'sucursal_id',
        'direccion_id', 'estatus_empleado')
        ->latest()
        ->paginate(5);
        return $empleado;
    }

    //TODA LA INFORMACION DE UN EMPLEADO
    public function findById($id)
    {
        $empleado = Empleado::select('nombres', 'usuario_empleado', 'tipo_id', 'no_documento', 'email',
        'puesto', 'estatus_empleado', 'institucion_id', 'departamento_id', 'sucursal_id', 'direccion_id')
        //->with('roles')
        ->findOrFail($id);

        return $empleado;
    }

    public function create(array $data)
    {
        // ACA SE DEBE ASIGNAR LOS ROLES
         // Agregar roles al usuario
        //$user->roles()->attach($request->roles);
        //$empleado->syncRoles($request->roles);
        // Retornar la respuesta con el usuario creado
        $data['password'] = bcrypt($data['password']);
        return Empleado::create($data);
    }


     public function update(Empleado $empleado, array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']); //cambiar contraseña si campo esta relleno
        }
        $empleado->update($data);
        return $empleado;
    }
}
