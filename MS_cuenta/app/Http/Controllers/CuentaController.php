<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;


class CuentaController extends Controller
{


    public function create(Request $request){
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
        $cuenta->idUsuario = $request->user()->id;
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

    public function editInfo(Request $request){
        $rules = [
            'info' => 'required|string'
        ];
        $this->validate($request, $rules);

        $idUsuario = $request->user()->id;

        $cuenta = Cuenta::where('idUsuario', $idUsuario)->first();

        $cuenta->info = $request->input('info');
        $cuenta->save(); //UPDATE

        return response()->json([
            'message' => 'Info editada con éxito'
        ]);
    }

    public function getCuenta ($idUsuario ){

        $cuenta = Cuenta::where('idUsuario', $idUsuario)->first();
        return $cuenta;
    }

    public function getFotoPerfil(Request $request){
        $idUsuario = $request->user()->id;
        $cuenta = Cuenta::where('idUsuario', $idUsuario)->first();
        return $cuenta->ruta;
    }

    public function subirFotoPerfil(Request $request, $ruta){
        $idUsuario = $request->user()->id;
        $cuenta = Cuenta::where('idUsuario', $idUsuario)->first();
        $cuenta->ruta = $ruta;
        $cuenta->save();
        return response()->json([
            'message' => 'Foto de perfil guardada con éxito'
        ]);


    }

}
