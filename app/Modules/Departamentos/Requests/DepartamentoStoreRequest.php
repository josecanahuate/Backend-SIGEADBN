<?php

namespace App\Modules\Departamentos\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartamentoStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sucursal_id' => 'required',
            'nombre_depto' => 'required|string|max:255',
            'tel' => 'nullable|string|max:50',
            'tel_ext' => 'nullable|string|max:50',
            'fax' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:50',
            'localidad' => 'nullable|string|max:255',
            'encargado' => 'nullable|string|max:255',
            'trabaja_sabado' => 'nullable',
            'trabaja_domingo' => 'nullable',
            'trabaja_feriado' => 'nullable',
        ];
    }



   public function messages(): array
   {
      return [
         'nombre_depto.required' => 'campo es requerido.',
         'sucursal_id.required' => 'campo es requerido.',
      ];
   }
}
