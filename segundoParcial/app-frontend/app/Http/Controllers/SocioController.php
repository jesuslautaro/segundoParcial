<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class SocioController extends Controller
{
    public function ListarSocios(Request $request){
        $socios = Http::get(getenv("APP_SOCIOS_URL") . "socio") -> json();
        return view('listaSocios',["socios" => $socios]);
    }

    public function AgregarSocio(Request $request){
        $response = Http::put(getenv("APP_SOCIOS_URL") . "socio", [
            'nombre' => $request -> post('nombre'),
            'apellido' => $request -> post('apellido'),
            'telefono' => $request -> post('telefono'),
            'correo' => $request -> post('correo'),
            'fecha_nacimiento' => $request -> post('fecha_nacimiento')
        ]) -> json();

        if($response["resultado"] === "OK")
            return view('formAgregarSocio',["exito" => true]);
        //else 
            // Procesar errors
    }

}
