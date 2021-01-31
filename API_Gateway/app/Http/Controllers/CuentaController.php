<?php

namespace App\Http\Controllers;

use App\Services\MultimediaService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\CuentaService;


class CuentaController extends Controller
{
    use ApiResponser;

    public $cuenta_service;

    public function __construct(CuentaService $cuenta_service)
    {
        $this->cuenta_service = $cuenta_service;

    }



    public function create(Request $request)
    {
        $idUsuario = $request->user()->id;
        return $this->successResponse($this->cuenta_service->create($request->all(), $idUsuario));
    }

    public function getCuenta(Request $request){
        $idUsuario = $request->user()->id;
        return $this->successResponse($this->cuenta_service->getCuenta($idUsuario));
    }

    public function editInfo(Request $request){
        $idUsuario = $request->user()->id;
        return $this->successResponse($this->cuenta_service->editCuenta($request->all(), $idUsuario));
    }

    public function getFotoPerfil(Request $request){
        $idUsuario = $request->user()->id;
        return $this->successResponse($this->cuenta_service->getFotoPerfil($idUsuario));
    }

    public function subirFotoPerfil(Request $request){
        $rules = [
            'ruta'=>'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
        $this->validate($request, $rules);

        $idUsuario = $request->user()->id;
        if ($request->hasFile("ruta")) {
            $request->file('ruta');
            return $this->successResponse($this->cuenta_service->subirFotoPerfil($idUsuario, $request->ruta));
        }
        return response()->json([
            "message" => "no se subió nada aaa"
        ]);
    }

    public function getImagen(Request $request){
        $idUsuario = $request->user()->id;

        return $this->successResponse($this->multimedia_service);
    }


}
