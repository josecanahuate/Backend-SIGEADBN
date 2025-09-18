<?php

namespace App\Modules\Direccion\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DireccionUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'institucion_id' => 'required',
            'razon_social' => 'required|string|max:255',
            'nombre_direccion' => 'required|string|max:255',
            'rnc' => 'required|string|max:100',
            'fecha_aniversario' => 'nullable|date',
            'direccion_1' => 'required|string|max:255',
            'direccion_2' => 'nullable|string|max:255',
            'tel_1' => 'nullable|string|max:50',
            'tel_2' => 'nullable|string|max:50',
            'fax' => 'nullable|string|max:50',
            'localidad' => 'nullable|string|max:100',
            'email' => 'nullable|email',
            'encargado' => 'nullable|string|max:100',
            'cod_iso' => 'nullable',
            'cod_ministerio' => 'nullable',
            'tasa_itbis' => 'nullable|numeric|min:0',
            'dias_cobro_gracia' => 'nullable',
            'tipo_cuadre' => 'nullable',
            'trabaja_sabado' => 'nullable',
            'trabaja_domingo' => 'nullable',
            'trabaja_feriado' => 'nullable',
        ];
    }

   public function messages(): array
   {
      return [
         'razon_social.required' => 'campo obligatorio.',
         'rnc.required' => 'campo obligatorio',
         'nombre_direccion.required' => 'campo obligatorio',
         'direccion_1.required' => 'campo obligatorio',
         'email.email' => 'introduzca un email válido.',
      ];
   }
}