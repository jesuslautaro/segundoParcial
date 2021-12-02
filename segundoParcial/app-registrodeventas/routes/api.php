<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentasController;


Route::prefix('reserva')->group(function () {
    Route::get('/venta', [VentasController::class,"Listar"]);
    Route::get('/venta/{d}', [VentasController::class,"ListarUno"]);
    Route::post('/venta', [VentasController::class,"Agregar"]);
    Route::put('/venta', [VentasController::class,"Modificar"]);
    Route::delete('/venta', [VentasController::class,"Eliminar"]);
});

