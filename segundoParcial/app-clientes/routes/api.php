<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocioController;


Route::get('/socio', [SocioController::class,"Listar"]);
Route::get('/socio/{d}', [SocioController::class,"ListarUno"]);
Route::put('/socio', [SocioController::class,"Agregar"]);
Route::post('/socio', [SocioController::class,"Modificar"]);
Route::delete('/socio', [SocioController::class,"Eliminar"]);
