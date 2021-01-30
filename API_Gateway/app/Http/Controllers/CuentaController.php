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
    public $multimedia_service;

    public function __construct(CuentaService $cuenta_service, MultimediaService $multimedia_service)
    {
        $this->cuenta_service = $cuenta_service;
        $this->multimedia_service = $multimedia_service;
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
        $idUsuario = $request->user()->id;

        $ruta= $this->successResponse($this->multimedia_service->guardarImagenPerfil($request->file('ruta')));

        return $this->successResponse($this->cuenta_service->subirFotoPerfil($idUsuario, $ruta));
    }

    public function getImagen(Request $request){
        $idUsuario = $request->user()->id;

        return $this->successResponse($this->multimedia_service)
    }


}
