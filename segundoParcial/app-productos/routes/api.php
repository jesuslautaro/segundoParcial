<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;


Route::get('/producto', [ProductosController::class,"ListarProductos"]);
Route::get('/producto/{d}', [ProductosController::class,"ListarUno"]);
Route::post('/agregar', [ProductosController::class,"Agregar"]);
Route::put('/modificar', [ProductosController::class,"Modificar"]);
Route::delete('/eliminar', [ProductosController::class,"Eliminar"]);
Route::put('/stock', [ProductosController::class,"BajarStock"]);
