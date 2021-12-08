<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class UsuarioController extends Controller
{
    public function AgregarUsuario(Request $request, $tipo){
        $response = Http::post(getenv("APP_USUARIOS_URL") . "usuario", [
            'nombre' => $request -> post('nombre'),
            'apellido' => $request -> post('apellido'),
            'telefono' => $request -> post('telefono'),
            'correo' => $request -> post('correo'),
            'tipo' => $tipo
        ]) -> json();
        if(isset($response["resultado"]))
            return true;
        else {
            return "";
        }
    }

    public function ModificarUsuario(Request $request){
        $datosUsuario = $this -> obtenerDatosUsuario($request -> post('id'));
        $tipo = null;
        if ($datosUsuario['tipo'] == 0){
            $tipo = 0;
        }else{
            $tipo = 1;
        }

        $response = Http::put(getenv("APP_USUARIOS_URL") . "modificar", [
            'id' => $request -> post('id'),
            'nombre' => $request -> post('nombre'),
            'apellido' => $request -> post('apellido'),
            'telefono' => $request -> post('telefono'),
            'correo' => $request -> post('correo'),
            'tipo' => $tipo
        ]) -> json();

        if($response["resultado"]=== "OK")
        return view('formModificarUsuarios',["exito" => true]);
        else {
            return "ERROR";
        }
    }

    public function EliminarUsuario(Request $request){
        $response = Http::delete(getenv("APP_USUARIOS_URL") . "eliminar", [
            'id' => $request -> post('id'),
        ]) -> json();

        if($response["resultado"]=== "OK")
            return view('formEliminarUsuarios',["exito" => true]);
        else {
            return "ERROR";
        }
    }

    private function obtenerDatosUsuario($id_cliente){
        $usuario = Http::get(getenv("APP_USUARIOS_URL") . "usuario") -> json();
        foreach($usuario as $u){
            if($id_cliente == $u['id']){
                return array('nombre' => $u['nombre'], 'apellido' => $u['apellido'], 'telefono' => $u['telefono'], 'correo' => $u['correo'], 'tipo' => $u['tipo']);
            }
        }
    }

    public function ListarUsuarios(Request $request){
        $clientes = Http::get(getenv("APP_USUARIOS_URL") . "usuario") -> json();
        return view('listarUsuarios',["usuarios" => $clientes]);
    }



    





















}
