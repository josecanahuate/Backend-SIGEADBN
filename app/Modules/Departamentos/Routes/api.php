<?php

use App\Modules\Departamentos\Controllers\DepartamentoController;
use Illuminate\Support\Facades\Route;



Route::get("/departamentos", [DepartamentoController::class, 'index']);
Route::post("/departamentos", [DepartamentoController::class, 'store']);
Route::put("/departamentos/{id}", [DepartamentoController::class, 'update']);



