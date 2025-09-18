<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Sucursal\Controllers\SucursalController;


Route::get("/sucursales", [SucursalController::class, 'index']);
Route::post("/sucursales", [SucursalController::class, 'store']);
Route::put("/sucursales/{id}", [SucursalController::class, 'update']);



