<?php

use App\Modules\Empleados\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;



Route::get("/empleados", [EmpleadoController::class, 'index']);
Route::post("/empleados", [EmpleadoController::class, 'store']);
Route::put("/empleados/{empleado}", [EmpleadoController::class, 'update']);



