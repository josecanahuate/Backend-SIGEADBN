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
/*         $empleadoId = Empleado::find($this->empleado->id);
        $empleadoId = Empleado::findOrfail($id); */

       // $empleadoId = $this->route('empleado')->id; 


        return [
            'institucion_id'   => 'nullable|exists:institucion_bn,id',
            'direccion_id'     => 'nullable|exists:direccion_bn,id',
            'departamento_id'  => 'nullable|exists:departamentos_bn,id',
            'sucursal_id'      => 'nullable|exists:sucursal_bn,id',

            'nombres' => [
                'required', 'string', 'max:255',
                Rule::unique('empleados_bn', 'nombres')->ignore($empleadoId)
            ],

            'tipo_id' => 'required|in:Cedula,Pasaporte',
            'no_documento' => 'required|string|max:255',


            'usuario_empleado' => 'required|string|max:255|unique:'.Empleado::class,


            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user)], 


            'email' => 'required|email|unique:users,id,' . $empleadoId,

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('empleados_bn')->ignore($empleadoId),
            ],

            'password' => 'nullable',

            'puesto' => 'required|string|max:255',
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