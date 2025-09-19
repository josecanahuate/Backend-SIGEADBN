<?php

namespace App\Modules\Departamentos\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Departamentos\Requests\DepartamentoStoreRequest;
use App\Modules\Departamentos\Services\DepartamentoService;
use App\Modules\Departamentos\Requests\DepartamentoUpdateRequest;
use Illuminate\Http\JsonResponse;

class DepartamentoController extends Controller
{
    protected $service;

    public function __construct(DepartamentoService $service)
    {
        $this->service = $service;
    }

    //Listado de Departamentos
    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }


    //Crear Departamentos
    public function store(DepartamentoStoreRequest $request): JsonResponse
    {
      try {
        $departamento = $this->service->create($request->validated());
        return response()->json([
            'message' => 'Departamento creado!',
            'data' => $departamento
        ], 201);

      } catch (\Exception $e) {
            return response()->json([
            'message' => 'Error al Crear Departamento',
            'error' => $e->getMessage()
         ], 500);
        }

    }


    //Actualizar Departamentos
    public function update(DepartamentoUpdateRequest $request, $id): JsonResponse
    {
      try {
        $departamento = $this->service->update($id, $request->validated());

        return response()->json([
            'message' => 'Departamento Actualizado!',
            'data' => $departamento
        ], 201);

      } catch (\Exception $e) {
            return response()->json([
            'message' => 'Error al Actualizar Departamento',
            'error' => $e->getMessage()
         ], 500);
        }
    }
}
