<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;


Route::get('/productos', [ProductosController::class,"ListarProductos"]);
Route::get('/productos/{d}', [ProductosController::class,"ListarUno"]);
Route::post('/productos', [ProductosController::class,"Agregar"]);
Route::put('/productos', [ProductosController::class,"Modificar"]);
Route::delete('/productos', [ProductosController::class,"Eliminar"]);
Route::put('/stock', [ProductosController::class,"BajarStock"]);
