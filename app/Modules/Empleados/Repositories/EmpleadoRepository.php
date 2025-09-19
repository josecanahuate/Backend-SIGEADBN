<?php

namespace App\Modules\Empleados\Repositories;

use App\Modules\Empleados\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class EmpleadoRepository
{
    public function getAll()
    {
        //MOSTRAR SOLO 2 PARTES DEL NOMBRE -> HACERLO EN EL FRONTEND
        $empleado = User::select('id', 'nombres', 'usuario_empleado', 'institucion_id', 'departamento_id', 'sucursal_id',
        'direccion_id', 'estatus_empleado')
        ->latest()
        ->paginate(5);
        return $empleado;
    }

    //TODA LA INFORMACION DE UN EMPLEADO
    public function findById($id)
    {
        $empleado = User::select('id', 'nombres', 'usuario_empleado', 'tipo_id', 'no_documento', 'email',
        'puesto', 'estatus_empleado', 'institucion_id', 'departamento_id', 'sucursal_id', 'direccion_id')
        //->with('roles')
        ->findOrFail($id);

        return $empleado;
    }

    function eliminarTildes(string $cadena): string
    {
    $tildes = [
        'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u',
        'à' => 'a', 'è' => 'e', 'ì' => 'i', 'ò' => 'o', 'ù' => 'u',
        'Á' => 'A', 'É' => 'E', 'Í' => 'I', 'Ó' => 'O', 'Ú' => 'U',
        'À' => 'A', 'È' => 'E', 'Ì' => 'I', 'Ò' => 'O', 'Ù' => 'U',
    ];
    return str_replace(array_keys($tildes), array_values($tildes), $cadena);
    }

    public function create(array $data)
    {
        //Eliminar Tildes y Convertir Nombre a Mayuscula
        $data['nombres'] = $this->eliminarTildes(Str::of($data['nombres'])->upper());
         // Agregar roles al usuario
        //$user->roles()->attach($data['roles']); 
        //ò $empleado->syncRoles($request->roles);
        return User::create($data);
    }


     public function update(User $empleado, array $data)
    {
        if (isset($data['password'])) {
            //$data['password'] = bcrypt($data['password']); //cambiar contraseña si campo esta relleno
            $data['password'] = Hash::make($data['password']); //cambiar contraseña si campo esta relleno
        }
        $empleado->update($data);
        return $empleado;
    }
}
