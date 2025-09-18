<?php

namespace App\Modules\Sucursal\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SucursalUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'direccion_id' => 'nullable',
            'razon_social' => 'required|string|max:255',
            'rnc' => 'required|string|max:100',
            'nombre_sucursal' => 'required|string|max:255',
            'fecha_aniversario' => 'nullable|date',
            'direccion_1' => 'required|string|max:255',
            'direccion_2' => 'nullable|string|max:255',
            'tel_1' => 'nullable|string|max:50',
            'tel_2' => 'nullable|string|max:50',
            'fax' => 'nullable|string|max:50',
            'localidad' => 'nullable|string|max:100',
            'email' => 'nullable|email',
            'encargado' => 'nullable|string|max:100',
            'cod_iso' => 'nullable|integer',
            'cod_ministerio' => 'nullable|integer',
            'trabaja_sabado' => 'nullable',
            'trabaja_domingo' => 'nullable',
            'trabaja_feriado' => 'nullable',
            'tipo_cuadre' => 'nullable',
        ];
    }

   public function messages(): array
   {
      return [
         'razon_social.required' => 'campo es requerido.',
         'rnc.required' => 'campo es requerido',
         'nombre_sucursal.required' => 'campo es requerido',
         'direccion_1.required' => 'campo es requerido',
      ];
   }
}