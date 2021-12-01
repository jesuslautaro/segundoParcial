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
        $usuarios = Http::get(getenv("APP_USUARIOS_URL") . "usuario") -> json();
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

    private function obtenerDatosDeVentas($ventas){
        $ventasConDatosCompletos = [];
        foreach($ventas as $r){
            $datosUsuario = $this -> obtenerDatosUsuario($r ->id_usuario);
            $datosProducto = $this -> obtenerDatosProducto($r ->id_producto);

            $fila = [
                'id' => $r->id,
                'id_usuario' => $r->id_usuario,
                'id_producto' => $r->id_producto,
                'nombre_producto' =>$datosProducto['nombre'],
                'stock' =>$datosProducto['stock'],
                'nombre' =>$datosUsuario['nombre'],
                'apellido' =>$datosUsuario['apellido'],

            ];
            array_push($ventasConDatosCompletos,$fila);
        }
        return $ventasConDatosCompletos;

    }


    public function Listar(Request $request){
        $ventas = Ventas::all();        
        return $this -> obtenerDatosDeVentas($ventas);
    }

    public function ListarUno(Request $request, $idProducto){
        $venta = Ventas::where('id',$idProducto) ->first();
        return $venta;
    }


    public function Agregar(Request $request){
        $r = new Ventas();
        $r -> id_usuario = $request -> post('id_usuario');
        $r -> id_producto = $request -> post('id_producto');
        $r -> stock = $request -> post('stock');

        $r -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Compra hecha correctamente"
        );

        return $BajarStock($request);
    }

    public function BajarStock(Request $request){
        $bajaStock = Http::put(getenv("APP_PRODUCTOS_URL") . "stock", 
        [
            'id' => $request -> post('id_producto'),
            'stock' => $request -> post('stock'),
        ]) -> json();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Realizado"
        );
        return $respuesta;
    }

    public function Modificar(Request $request){
        $l = Ventas::where('id',$request -> post('id')) ->first();

        $l -> id_usuario = $request -> post('id_usuario');
        $l -> id_producto = $request -> post('id_producto');
        $l -> stock = $request -> post('stock');

        $l -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Compra modificada correctamente"
        );
        return $respuesta;
    }


    public function Eliminar(Request $request){
        $l = Ventas::where('id',$request -> post('id')) ->first();
        $l -> delete();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Compra eliminada correctamente"
        );
        return $respuesta;
    }



}
