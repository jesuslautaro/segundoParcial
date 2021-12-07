<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;


Route::get('/listarSocios', [SocioController::class,"ListarSocios"]);
Route::get('/agregarSocio', function () {
    return view('formAgregarSocio');
});
Route::post('/agregarSocio', [SocioController::class,"AgregarSocio"]);