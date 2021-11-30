<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;


Route::get('/usuario', [UsuariosController::class,"ListarUsuarios"]);
Route::get('/usuario/{d}', [UsuariosController::class,"ListarUnoPorCorreo"]);
Route::post('/usuario', [UsuariosController::class,"Agregar"]);
Route::put('/modificar', [UsuariosController::class,"Modificar"]);
Route::delete('/eliminar', [UsuariosController::class,"Eliminar"]);