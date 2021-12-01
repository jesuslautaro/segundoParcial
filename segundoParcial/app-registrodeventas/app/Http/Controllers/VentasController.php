<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;




class VentasController extends Controller
{
    private function obtenerDatosUsuario($id_usuario){
        $socios = Http::get(getenv("APP_USUARIOS_URL") . "usuario") -> json();
        foreach($usuarios as $usuario){
            if($id_usuario == $usuario['id']){
                return array('nombre' => $usuario['nombre'], 'apellido' => $usuario['apellido']);
            }
        }
    }

    private function obtenerDatosProducto($id_producto){
        $productos = Http::get(getenv("APP_PRODUCTOS_URL") . "producto") -> json();
        foreach($productos as $producto){
            if($id_producto == $producto['id']){
                return array('nombre' =>$producto['nombre'], 'stock' => $producto['stock']);
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
