<?php

namespace App\Modules\Sucursal\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SucursalStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'razon_social' => 'required|string|max:255',
            'rnc' => 'required|string|max:100',
            'nombre_institucion' => 'required|string|max:255',
            'direccion_1' => 'required|string|max:255',
            'direccion_2' => 'nullable|string|max:255',
            'tel_1' => 'nullable|string|max:50',
            'tel_2' => 'nullable|string|max:50',
            'fax' => 'nullable|string|max:50',
            'email' => 'nullable|email',
            'a_postal' => 'nullable|string|max:100',
            'localidad' => 'nullable|string|max:100',
            'encargado' => 'nullable|string|max:100',
            'capital' => 'nullable|numeric|min:0',
            'registro_ind' => 'nullable|integer',
            'idss' => 'nullable|integer',
            'registro' => 'nullable|integer',
            'poliza' => 'nullable|integer',
            'aniversario' => 'nullable|date',
            'actividad' => 'nullable|string',
            'clase_empresa' => 'nullable|string',
            'mes_inicio' => 'nullable|integer|min:1|max:12',
            'mes_fin' => 'nullable|integer|min:1|max:12',
            'tasa_itbis' => 'nullable|numeric|min:0',
            'cuenta_periodo' => 'nullable|string',
        ];
    }



   public function messages(): array
   {
      return [
         'razon_social.required' => 'campo obligatorio.',
         'rnc.required' => 'campo obligatorio',
         'nombre_institucion.required' => 'campo obligatorio',
         'direccion_1.required' => 'campo obligatorio',
         'email.email' => 'introduzca un email válido.',
      ];
   }
}
