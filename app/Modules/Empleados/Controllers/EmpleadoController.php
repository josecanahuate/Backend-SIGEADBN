<?php

namespace App\Modules\Empleados\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Empleados\Requests\EmpleadoStoreRequest;
use App\Modules\Empleados\Requests\EmpleadoUpdateRequest;
use App\Modules\Empleados\Services\EmpleadoService;
use Illuminate\Http\JsonResponse;

class EmpleadoController extends Controller
{
    protected $service;

    public function __construct(EmpleadoService $service)
    {
        $this->service = $service;
    }

    //Listado de Empleados
    public function index(): JsonResponse
    {
        return response()->json($this->service->getAll());
    }


    //Crear Empleados
    public function store(EmpleadoStoreRequest $request): JsonResponse
    {  
      try {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        // Agregar roles al usuario
        //$user->roles()->attach($request->roles);
        //$empleado->syncRoles($request->roles);
        // Retornar la respuesta con el usuario creado
        $empleado = $this->service->create($data);
          return response()->json([
            'status' => true,
            'message' => 'Empleado creado!',
            'empleado' => $empleado
        ], 201);

      } catch (\Exception $e) {
            return response()->json([
            'message' => 'Error al Crear Empleado',
            'error' => $e->getMessage()
         ], 500);
        }
    }



     /*  public function edit(User $user)
    {
        $role = Role::all();
        return Inertia::render('Users/Edit', [
            "user" => $user,
            "userRoles" => $user->roles()->pluck('name'),
            "roles" => Role::pluck('name'),
        ]);
    } */

    //Actualizar Empleados
    public function update(EmpleadoUpdateRequest $request, $id): JsonResponse
    {
      try {
        $empleado = $this->service->update($id, $request->validated());

        return response()->json([
            'message' => 'Empleado Actualizado!',
            'data' => $empleado
        ], 201);

      } catch (\Exception $e) {
            return response()->json([
            'message' => 'Error al Actualizar Empleado',
            'error' => $e->getMessage()
         ], 500);
        }
    }
}
