<?php

namespace App\Http\Controllers;

use App\Services\MultimediaService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class MultimediaController extends Controller
{
    use ApiResponser;

    public $multimedia_service;

    public function __construct(MultimediaService $multimedia_service){
        $this->multimedia_service = $multimedia_service;
    }

    public function guardarImagenPerfil(Request $request){
        return $this->successResponse($this->multimedia_service->guardarImagenPerfil($request->file('ruta')));
    }


    public function getImagen(Request $request){

        //return $this->successResponse($this->multimedia_service->getImagen);
    }
}
