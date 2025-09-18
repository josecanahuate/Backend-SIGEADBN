<?php

namespace App\Modules\Institucion\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Institucion\Requests\InstitucionStoreRequest;
use App\Modules\Institucion\Requests\InstitucionUpdateRequest;
use App\Modules\Institucion\Services\InstitucionService;
use Illuminate\Http\JsonResponse;

class InstitucionController extends Controller
{
    protected $service;

    public function __construct(InstitucionService $service)
    {
        $this->service = $service;
    }

    //Listado de Instituciones
    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }


    //Crear Instituciones
    public function store(InstitucionStoreRequest $request): JsonResponse
    {
      try {
        $institucion = $this->service->create($request->validated());
        return response()->json([
            'message' => 'Institución creada!',
            'data' => $institucion
        ], 201);

      } catch (\Exception $e) {
            return response()->json([
            'message' => 'Error al Crear Institución',
            'error' => $e->getMessage()
         ], 500);
        }

    }


    //Actualizar Instituciones
    public function update(InstitucionUpdateRequest $request, $id): JsonResponse
    {
      try {
        $institucion = $this->service->update($id, $request->validated());
        //return response()->json($institucion, 201);

        return response()->json([
            'message' => 'Institución Actualizada!',
            'data' => $institucion
        ], 201);

      } catch (\Exception $e) {
            return response()->json([
            'message' => 'Error al Actualizar Institución',
            'error' => $e->getMessage()
         ], 500);
        }
    }
}
