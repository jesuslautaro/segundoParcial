<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentasController;


Route::prefix('reserva')->group(function () {
    Route::get('/', [VentasController::class,"Listar"]);
    Route::get('/', [VentasController::class,"ListarUno"]);
    Route::post('/', [VentasController::class,"Agregar"]);
    Route::put('/', [VentasController::class,"Modificar"]);
    Route::delete('/', [VentasController::class,"Eliminar"]);
});

