<?php

use App\Modules\Direccion\Controllers\DireccionController;
use App\Modules\Institucion\Controllers\InstitucionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# INSTITUCION
Route::get("/instituciones", [InstitucionController::class, 'index']);
Route::post("/instituciones", [InstitucionController::class, 'store']);
Route::put("/instituciones/{id}", [InstitucionController::class, 'update']);

# DIRECCION
require base_path('app/Modules/Direccion/Routes/api.php');
