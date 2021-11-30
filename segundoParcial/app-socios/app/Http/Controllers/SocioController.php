<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class SocioController extends Controller
{
    public function Listar(Request $request){
        $socios = Socio::all();
        return $socios;
    }

    public function ListarUno(Request $request, $idSocio){
        $socio = Socio::where('id',$idSocio) ->first();
        return $socio;
    }

    public function Agregar(Request $request){
        $s = new Socio();
        $s -> nombre = $request -> post('nombre');
        $s -> apellido = $request -> post('apellido');
        $s -> correo = $request -> post('correo');
        $s -> fecha_nacimiento = $request -> post('fecha_nacimiento');
        $s -> telefono = $request -> post('telefono');

        $s -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Socio insertado correctamente"
        );

        return $respuesta;
    }

    public function Modificar(Request $request){
        $s = Socio::where('id',$request -> post('id')) ->first();

        $s -> nombre = $request -> post('nombre');
        $s -> apellido = $request -> post('apellido');
        $s -> correo = $request -> post('correo');
        $s -> fecha_nacimiento = $request -> post('fecha_nacimiento');
        $s -> telefono = $request -> post('telefono');

        $s -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Socio Modificado correctamente"
        );
        return $respuesta;
    }

    public function Eliminar(Request $request){
        $s = Socio::where('id',$request -> post('id')) ->first();
        $s -> delete();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Socio Eliminado correctamente"
        );
        return $respuesta;
    }
}
