<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ProductoController extends Controller
{

    public function ListarProductos(Request $request){
        $producto = Http::get(getenv("APP_PRODUCTOS_URL") . "productos") -> json();
        return view('listarProductos',["productos" => $producto]);
    }

    public function AgregarProducto(Request $request){
        $response = Http::post(getenv("APP_PRODUCTOS_URL") . "productos", [
            'nombre' => $request -> post('nombre'),
            'descripcion' => $request -> post('descripcion'),
            'stock' => $request -> post('stock'),
        ]) -> json();
        if($response["resultado"] === "OK")
        return view('formAgregarProducto',["exito" => true]);
        else {
            return "Error";
        }

    }

    public function ModificarProducto(Request $request){
        $response = Http::put(getenv("APP_PRODUCTOS_URL") . "productos", [
            'id' => $request -> post('id'),
            'nombre' => $request -> post('nombre'),
            'descripcion' => $request -> post('descripcion'),
            'stock' => $request -> post('stock'),
        ]) -> json();
        if($response["resultado"] === "OK")
        return view('formModificarProducto',["exito" => true]);
        else {
            return "Error";
        }

    }

    public function EliminarProducto(Request $request){
        $response = Http::delete(getenv("APP_PRODUCTOS_URL") . "productos", [
            'id' => $request -> post('id'),
        ]) -> json();

        if($response["resultado"]=== "OK")
        return view('formEliminarProducto',["exito" => true]);
        }
    




































}
