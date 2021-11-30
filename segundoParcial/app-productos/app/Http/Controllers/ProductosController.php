<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;


class ProductosController extends Controller
{
    public function ListarProductos(Request $request){
        $productos = Productos::all();
        return $productos;
    }

    public function ListarUno(Request $request, $idProducto){
        $producto = Productos::where('id',$idProducto) ->first();
        return $producto;
    }
    
    public function Agregar(Request $request){
        $p = new Productos();
        $p -> nombre = $request -> post('nombre');
        $p -> descripcion = $request -> post('descripcion');
        $p -> stock = $request -> post('stock');

        $p -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Producto agregado correctamente"
        );

        return $respuesta;
    }

    public function Modificar(Request $request){
        $p = Productos::where('id',$request -> post('id')) ->first();

        $p -> nombre = $request -> post('nombre');
        $p -> descripcion = $request -> post('descripcion');
        $p -> stock = $request -> post('stock');

        $p -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Producto modificado correctamente"
        );
        return $respuesta;
    }

    public function Eliminar(Request $request){
        $p = Productos::where('id',$request -> post('id')) ->first();
        $p -> delete();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Producto eliminado correctamente"
        );
        return $respuesta;
    }

    public function BajarStock(Request $request){
        $p = Productos::where('id',$request -> post('id')) ->first();
        $p -> stock = $p -> stock - $request -> post('stock');

        $p -> save();

        $respuesta = array(
            "resultado" => "Stock actualizado",
        );
        return $respuesta;
    }


}
