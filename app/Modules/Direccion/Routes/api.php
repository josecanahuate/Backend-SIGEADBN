<?php

use App\Modules\Direccion\Controllers\DireccionController;
use Illuminate\Support\Facades\Route;


Route::get("/direcciones", [DireccionController::class, 'index']);
Route::post("/direcciones", [DireccionController::class, 'store']);
Route::put("/direcciones/{id}", [DireccionController::class, 'update']);
