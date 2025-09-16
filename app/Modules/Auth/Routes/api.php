<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| LOGIN API Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware('auth:sanctum')->get('/api', function (Request $request) {
    return $request->user();
});
