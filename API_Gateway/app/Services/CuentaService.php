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
        return $this->performRequest('GET', '/getCuenta/{$idUsuario}');
    }


}


