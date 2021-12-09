<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;


Route::get('/listarUsuarios', [UsuarioController::class,"ListarUsuarios"]);

Route::get('/registroCliente', function () {
    return view('formAgregarCliente');
});
Route::post('/registroCliente', [UsuarioController::class,"AgregarUsuario"]);

Route::get('/registroVendedor', function () {
    return view('formAgregarVendedor');
});
Route::post('/registroVendedor', [UsuarioController::class,"AgregarUsuario"]);

Route::get('/modificarUsuario', function () {
    return view('formModificarUsuarios');
});
Route::post('/modificarUsuario', [UsuarioController::class,"ModificarUsuario"]);

Route::get('/eliminarUsuario', function () {
    return view('formEliminarUsuarios');
});
Route::post('/eliminarUsuario', [UsuarioController::class,"EliminarUsuario"]);



Route::get('/listarProductos', [ProductoController::class,"ListarProductos"]);
Route::get('/agregarProductos', function () {
    return view('formAgregarProducto');
});
Route::get('/modificarProductos', function () {
    return view('formModificarProducto');
});
Route::post('/agregarProductos', [ProductoController::class,"AgregarProducto"]);
Route::post('/modificarProductos', [ProductoController::class,"ModificarProducto"]);
Route::get('/eliminarProductos', function () {
    return view('formEliminarProducto');
});
Route::post('/eliminarProductos', [ProductoController::class,"EliminarProducto"]);


