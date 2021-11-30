<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;




class ReservaController extends Controller
{
    private function obtenerDatosSocio($id_socio){
        $socios = Http::get(getenv("APP_SOCIOS_URL") . "socio") -> json();
        foreach($socios as $socio){
            if($id_socio == $socio['id']){
                return array('nombre' => $socio['nombre'], 'apellido' => $socio['apellido']);
            }
        }
    }

    private function obtenerTituloLibro($id_libro){
        $libros = Http::get(getenv("APP_LIBROS_URL") . "libro") -> json();
        foreach($libros as $libro){
            if($id_libro == $libro['id']){
                return $libro['titulo'];
            }
        }
    }

    private function obtenerDatosDeReservas($reservas){
        $reservasConDatosCompletos = [];
        foreach($reservas as $r){
            $datosSocio = $this -> obtenerDatosSocio($r -> id_socio);
            $titulo = $this -> obtenerTituloLibro($r -> id_libro);

            $fila = [
                'id_reserva' => $r->id,
                'id_socio' => $r->id_socio,
                'id_libro' => $r->id_libro,
                'titulo' => $titulo,
                'nombre_socio' => $datosSocio['nombre'],
                'apellido_socio' => $datosSocio['apellido'],

            ];
            array_push($reservasConDatosCompletos,$fila);
        }
        return $reservasConDatosCompletos;
    }

    public function Listar(Request $request){
        $reservas = Reserva::all();        
        return $this -> obtenerDatosDeReservas($reservas);
    }

    public function Agregar(Request $request){
        $r = new Reserva();
        $r -> id_socio = $request -> post('id_socio');
        $r -> id_libro = $request -> post('id_libro');
        $r -> devolucion = "2021-11-05"; // Imaginen que le sumo 30 dias a la fecha actual
        $r -> devuelto = false;

        $r -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Reserva insertado correctamente"
        );

        return $respuesta;
    }

    public function Modificar(Request $request){
        $l = Reserva::where('id',$request -> post('id')) ->first();

        $l -> titulo = $request -> post('titulo');
        $l -> anio = $request -> post('anio');
        $l -> autor = $request -> post('autor');
        $l -> editorial = $request -> post('editorial');
        $l -> genero = $request -> post('genero');

        $l -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Reserva Modificado correctamente"
        );
        return $respuesta;
    }

    public function Eliminar(Request $request){
        $l = Reserva::where('id',$request -> post('id')) ->first();
        $l -> delete();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Reserva Eliminado correctamente"
        );
        return $respuesta;
    }


    public function ListarLibros(Request $request){
        $response = Http::get(getenv("APP_LIBROS_URL") . "libro");
        return $response;
    }
}
