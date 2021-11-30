<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;


Route::prefix('reserva')->group(function () {
    Route::get('/', [ReservaController::class,"Listar"]);
    Route::put('/', [ReservaController::class,"Agregar"]);
    Route::post('/', [ReservaController::class,"Modificar"]);
    Route::delete('/', [ReservaController::class,"Eliminar"]);
});

