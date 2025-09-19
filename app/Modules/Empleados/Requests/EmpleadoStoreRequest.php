<?php

namespace App\Modules\Empleados\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'institucion_id' => 'required|exists:institucion_bn,id',
            'direccion_id' => 'required|exists:direccion_bn,id',
            'departamento_id' => 'required|exists:departamentos_bn,id',
            'sucursal_id' => 'required|exists:sucursal_bn,id',

            'nombres'          => 'required|string|max:255|unique:empleados_bn,nombres',
            'tipo_id'          => 'required|in:Cedula,Pasaporte',
            'no_documento'     => 'required|string|max:255|unique:empleados_bn,no_documento',
            'usuario_empleado' => 'required|string|max:255|unique:empleados_bn,usuario_empleado',
            'email'            => 'required|string|email|max:255|unique:empleados_bn,email',
            'password'         => 'required|string',
            #'password'         => 'required|string|min:8|confirmed',
            'puesto'           => 'required|string|max:255',
            'estatus_empleado' => 'required|in:Activo,Inactivo',
            #'roles' => 'required|array',
            #'roles.*' => 'exists:roles,id'
        ];
    }



   public function messages(): array
   {
      return [
        'institucion_id.required' => 'campo es requerido.',
        'direccion_id.required' => 'campo es requerido.',
        'departamento_id.required' => 'campo es requerido.',
        'sucursal_id.required' => 'campo es requerido.',

        'nombres.unique' => 'nombre ya existe.',
        'nombres.required' => 'campo es requerido.',
        'tipo_id.required' => 'campo es requerido.',
        'usuario_empleado.unique' => 'El usuario ya existe.',
        'no_documento.required' => 'campo es requerido.',
        'no_documento.unique' => 'El documento ya existe.',
        'password.required' => 'campo es requerido.',
        'puesto.required' => 'campo es requerido.',
        'estatus_empleado.required' => 'campo es requerido.',

        'email.required' => "campo es requerido.",
        'email.email' => "correo debe ser válido.",
        'email.unique' => "correo ya existe.",

        'password.required' => "contraseña requerida.",

        #'roles.required' => 'Selecciona al menos un rol.',
        #'roles.array' => 'Rol no válido.',
        #'roles.*.exists' => 'El rol seleccionado no existe.',
      ];
   }
}
