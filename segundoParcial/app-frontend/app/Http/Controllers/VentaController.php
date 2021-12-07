<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class VentaController extends Controller
{
    public function Listar(Request $request){
        $ventas = Http::get(getenv("APP_REGISTRODEVENTAS_URL") . "venta") -> json();
        return view('listarVentas',["ventas" => $ventas]);
    }

    public function Agregar(Request $request){
        $response = Http::put(getenv("APP_REGISTRODEVENTAS_URL") . "venta", [
            'id_producto' => $request -> post('id_producto'),
            'id_usuario' => $request -> post('id_usuario'),
            'stock' => $request->post('stock'),
        ]) -> json();

        if($response["resultado"] === "OK")
            return view('formAgregarVenta',["exito" => true]);
        else {
            return "Error";
        }
            
    }

    public function Modificar(Request $request){
        $response = Http::post(getenv('APP_REGISTRODEVENTAS_URL') . "venta" , [
            'id' => $request->post('id'),
            'id_usuario' => $request->post('id_usuario'),
            'id_producto' => $request->post('id_producto'),
            'stock' => $request->post('stock')
      ])-> json();

        if($response["resultado"] === "OK")
            return view('formModificarVentas' , ["exito" => true]);
        else {
                return "Error";
            }    
        }

    public function Eliminar(Request $request){
        $response = Http::post(getenv("APP_REGISTRODEVENTAS_URL") . "eliminar", [
            'id' => $request -> post('id'),
            ]) -> json();
            
            if($response["resultado"]=== "OK")
                return view('formEliminarVenta',["exito" => true]);
            else {
                return "ERROR";
        }
    }    

    
}
