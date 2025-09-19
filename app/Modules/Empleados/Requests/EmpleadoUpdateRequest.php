<?php

namespace App\Modules\Empleados\Requests;

use App\Modules\Empleados\Models\Empleado;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmpleadoUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
       $empleadoId = $this->route('empleado');
       //$id = $this->route('empleado');


        return [
            'institucion_id'   => 'nullable|exists:institucion_bn,id',
            'direccion_id'     => 'nullable|exists:direccion_bn,id',
            'departamento_id'  => 'nullable|exists:departamentos_bn,id',
            'sucursal_id'      => 'nullable|exists:sucursal_bn,id',

            'nombres' => "sometimes|string|max:255|unique:empleados_bn,nombres,$empleadoId",
            /* 'nombres' => [
                'required', 'string', 'max:255',
                Rule::unique('empleados_bn', 'nombres')->ignore($empleadoId)
            ], */

            'tipo_id' => 'sometimes|in:Cedula,Pasaporte',
            'no_documento' => 'sometimes|string|max:255',
            'usuario_empleado' => "sometimes|string|max:255|unique:empleados_bn,usuario_empleado,$empleadoId",
            'email' => "sometimes|email|max:255|unique:empleados_bn,email,$empleadoId",
            'password' => 'nullable',
            'puesto' => 'sometimes|string|max:255',
            'estatus_empleado' => 'sometimes|in:Activo,Inactivo',
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

        'nombres.required' => 'campo es requerido.',
        'tipo_id.required' => 'campo es requerido.',
        'no_documento.required' => 'campo es requerido.',
        'password.required' => 'campo es requerido.',
        'puesto.required' => 'campo es requerido.',
        'estatus_empleado.required' => 'campo es requerido.',

        'email.required' => "campo es requerido.",
        'email.email' => "correo debe ser válido.",
        'email.unique' => "correo ya existe.",

        'password.required' => "contraseña requerida."

        #'roles.required' => 'Selecciona al menos un rol.',
        #'roles.array' => 'Rol no válido.',
        #'roles.*.exists' => 'El rol seleccionado no existe.',
    ];
   }
}