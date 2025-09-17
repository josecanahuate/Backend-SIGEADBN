<?php

namespace App\Modules\Institucion\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstitucionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public static $wrap = false;

    public function toArray(Request $request): array
    {
        return [
         'id' => $this->id,
         'razon_social' => $this->razon_social,
         'rnc' => $this->rnc,
        ];
    }
}