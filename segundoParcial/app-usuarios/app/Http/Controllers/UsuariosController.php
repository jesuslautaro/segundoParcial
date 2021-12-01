<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class UsuariosController extends Controller
{
    public function ListarUsuarios(Request $request){
        $usuarios = Clientes::all();
        return $usuarios;
    }


    public function ListarUnoPorCorreo($correo){
        $usuarios = Clientes::where('correo',$correo) ->first();
        return $usuarios;
    }


    public function Agregar(Request $request){
        $u = new Clientes();
        $u -> nombre = $request -> post('nombre');
        $u -> apellido = $request -> post('apellido');
        $u -> correo = $request -> post('correo');
        $u -> telefono = $request -> post('telefono');
        $u -> tipo = $request -> post('tipo');

        $u -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Usuario agregado correctamente"
        );

        return $respuesta;
    }

    public function Modificar(Request $request){
        $u = Clientes::where('id',$request -> post('id')) ->first();

        $u -> nombre = $request -> post('nombre');
        $u -> apellido = $request -> post('apellido');
        $u -> correo = $request -> post('correo');
        $u -> telefono = $request -> post('telefono');
        $u -> tipo = $request -> post('tipo');

        $u -> save();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Usuario modificado correctamente"
        );
        return $respuesta;
    }

    public function Eliminar(Request $request){
        $s = Clientes::where('id',$request -> post('id')) ->first();
        $s -> delete();

        $respuesta = array(
            "resultado" => "OK",
            "mensaje" => "Usuario eliminado correctamente"
        );
        return $respuesta;
    }
}
