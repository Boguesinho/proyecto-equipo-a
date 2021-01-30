<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class CuentaService{

    use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.cuentas.base_uri');
        $this->secret = config('services.cuentas.secret');
    }

    public function getCuenta($idUsuario){
        return $this->performRequest('GET', "getCuenta/{$idUsuario}");
    }

    public function editCuenta($data, $idUsuario){
        return $this->performRequest('PUT', "cuenta/editInfo/{$idUsuario}", $data);
    }

    public function create($data, $idUsuario){
        return $this->performRequest('POST', "cuenta/create/{$idUsuario}", $data);
    }

    public function getFotoPerfil($idUsuario){
        return $this->performRequest('GET', "getFotoPerfil/{$idUsuario}");
    }

    public function subirFotoPerfil($idUsuario, $ruta){
        return $this->performRequest('POST', "subirFotoPerfil/{$idUsuario}/{$ruta}");
    }


}


