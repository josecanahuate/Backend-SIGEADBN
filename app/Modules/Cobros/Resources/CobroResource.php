<?php

namespace App\Modules\Cobros\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CobroResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'cliente_id' => $this->cliente_id,
            'servicio' => $this->servicio,
            'monto' => $this->monto,
            'estado' => $this->estado,
            'created_at' => $this->created_at->format('Y-m-d H:i:s')
        ];
    }
}
