<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;


Route::get('/usuario', [ClienteController::class,"ListarUsuarios"]);
Route::get('/usuario/{d}', [ClienteController::class,"ListarUnoPorCorreo"]);
Route::post('/usuario', [ClienteController::class,"Agregar"]);
Route::put('/modificar', [ClienteController::class,"Modificar"]);
Route::delete('/eliminar', [ClienteController::class,"Eliminar"]);