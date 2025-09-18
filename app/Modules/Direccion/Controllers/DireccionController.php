<?php

namespace App\Modules\Direccion\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Direccion\Requests\DireccionStoreRequest;
use App\Modules\Direccion\Requests\DireccionUpdateRequest;
use App\Modules\Direccion\Services\DireccionService;
use Illuminate\Http\JsonResponse;

class DireccionController extends Controller
{
    protected $service;

    public function __construct(DireccionService $service)
    {
        $this->service = $service;
    }

    //Listado de Direcciones
    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }


    //Crear Direcciones
    public function store(DireccionStoreRequest $request): JsonResponse
    {
      try {
        $Direccion = $this->service->create($request->validated());
        return response()->json([
            'message' => 'Dirección creada!',
            'data' => $Direccion
        ], 201);

      } catch (\Exception $e) {
            return response()->json([
            'message' => 'Error al Crear Dirección',
            'error' => $e->getMessage()
         ], 500);
        }

    }


    //Actualizar Direcciones
    public function update(DireccionUpdateRequest $request, $id): JsonResponse
    {
      try {
        $Direccion = $this->service->update($id, $request->validated());
        //return response()->json($Direccion, 201);

        return response()->json([
            'message' => 'Dirección Actualizada!',
            'data' => $Direccion
        ], 201);

      } catch (\Exception $e) {
            return response()->json([
            'message' => 'Error al Actualizar Dirección',
            'error' => $e->getMessage()
         ], 500);
        }
    }
}
