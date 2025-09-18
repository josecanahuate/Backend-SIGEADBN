<?php

namespace App\Modules\Sucursal\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Institucion\Requests\SucursalUpdateRequest;
use App\Modules\Sucursal\Requests\SucursalStoreRequest;
use App\Modules\Sucursal\Services\SucursalService;
use Illuminate\Http\JsonResponse;

class SucursalController extends Controller
{
    protected $service;

    public function __construct(SucursalService $service)
    {
        $this->service = $service;
    }

    //Listado de Sucursales
    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }


    //Crear Sucursales
    public function store(SucursalStoreRequest $request): JsonResponse
    {
      try {
        $sucursal = $this->service->create($request->validated());
        return response()->json([
            'message' => 'Sucursal creada!',
            'data' => $sucursal
        ], 201);

      } catch (\Exception $e) {
            return response()->json([
            'message' => 'Error al Crear Sucursal',
            'error' => $e->getMessage()
         ], 500);
        }

    }


    //Actualizar Sucursales
    public function update(SucursalUpdateRequest $request, $id): JsonResponse
    {
      try {
        $sucursal = $this->service->update($id, $request->validated());
        //return response()->json($sucursal, 201);

        return response()->json([
            'message' => 'Sucursal Actualizada!',
            'data' => $sucursal
        ], 201);

      } catch (\Exception $e) {
            return response()->json([
            'message' => 'Error al Actualizar Sucursal',
            'error' => $e->getMessage()
         ], 500);
        }
    }
}
