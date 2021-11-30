<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class LibroController extends Controller
{
    public function Listar(Request $request){
        $libros = Libro::all();
        return $libros;
    }

    public function ListarUno(Request $request, $idLibro){
        $libro = Libro::where('id',$idLibro) ->first();
        return $libro;
    }
    
    public function Agregar(Request $request){
        $l = new Libro();
        $l -> titulo = $request -> post('titulo');
        $l -> anio = $request -> post('anio');
        $l -> autor = $request -> post('autor');
        $l -> editorial = $request -> post('editorial');
        $l -> genero = $request -> post('genero');

        $l -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Libro insertado correctamente"
        );

        return $respuesta;
    }

    public function Modificar(Request $request){
        $l = Libro::where('id',$request -> post('id')) ->first();

        $l -> titulo = $request -> post('titulo');
        $l -> anio = $request -> post('anio');
        $l -> autor = $request -> post('autor');
        $l -> editorial = $request -> post('editorial');
        $l -> genero = $request -> post('genero');

        $l -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Libro Modificado correctamente"
        );
        return $respuesta;
    }

    public function Eliminar(Request $request){
        $l = Libro::where('id',$request -> post('id')) ->first();
        $l -> delete();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Libro Eliminado correctamente"
        );
        return $respuesta;
    }
}
