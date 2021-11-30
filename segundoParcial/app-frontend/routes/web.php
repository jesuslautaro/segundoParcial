<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SocioController;


Route::get('/listarSocios', [SocioController::class,"ListarSocios"]);
Route::get('/agregarSocio', function () {
    return view('formAgregarSocio');
});
Route::post('/agregarSocio', [SocioController::class,"AgregarSocio"]);