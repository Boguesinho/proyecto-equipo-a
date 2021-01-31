<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Multimedia;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;


class CuentaController extends Controller
{

    use ApiResponser;

    public function create(Request $request, $idUsuario){
        $rules = [
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|email|unique:cuentas',
            'telefono' => 'required|max:10',
            'genero' => 'required|string',
            'info' => 'string'
        ];
        $this->validate($request, $rules);

        $cuenta = new Cuenta();
        $cuenta->idUsuario = $idUsuario;
        $cuenta->ruta= null;
        $cuenta->nombre = $request->input('nombre');
        $cuenta->apellidos = $request->input('apellidos');
        $cuenta->email = $request->input('email');
        $cuenta->telefono = $request->input('telefono');
        $cuenta->genero = $request->input('genero');
        $cuenta->info = $request->input('info');

        $cuenta->save(); //INSERT

        return response()->json([
            'message' => 'Cuenta creada con éxito'
        ]);
    }

    public function editInfo(Request $request, $idUsuario){
        $rules = [
            'info' => 'required|string'
        ];
        $this->validate($request, $rules);

        $cuenta = Cuenta::where('idUsuario', $idUsuario)->first();

        $cuenta->info = $request->input('info');
        $cuenta->save(); //UPDATE

        return response()->json([
            'message' => 'Info editada con éxito'
        ]);
    }

    public function getCuenta ($idUsuario){

        $cuenta = Cuenta::where('idUsuario', $idUsuario)->first();
        return $this->successResponse($cuenta);
    }

    public function getFotoPerfil($idUsuario){
        $cuenta = Cuenta::where('idUsuario', $idUsuario)->first();
        return $cuenta->ruta;
    }

    public function subirFotoPerfil($idUsuario, Request $request){
        //$idUsuario = $request->user()->id;
        $cuenta = Cuenta::where('idUsuario', $idUsuario)->first();
        $cuenta->ruta = $request->input('original');
        $cuenta->save();
        return response()->json([
            'message' => 'Foto de perfil guardada con éxito',
            'ruta' => $cuenta->ruta
        ]);

    }

}
