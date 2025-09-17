<?php

namespace App\Policies;

use App\Models\Empleado;

/* class EmpleadoPolicy
{
    public function delete(Empleado $authUser, Empleado $user)
    {
        if ($authUser->can('admin.empleados.destroy')) {
            return true;
        }

        // Evita que un usuario elimine su propia cuenta
        if ($authUser->id === $user->id) {
            return false;
        }

        return false; // Por defecto, deniega el permiso
    }
} */