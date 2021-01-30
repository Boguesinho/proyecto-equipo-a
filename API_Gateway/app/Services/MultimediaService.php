<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class MultimediaService{

    use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.multimedias.base_uri');
        $this->secret = config('services.multimedias.secret');
    }

    public function getImagen($ruta){
        return $this->performRequest('GET', "getImagen/{$ruta}");
    }

    public function guardarImagenPerfil($data){
        return $this->performRequest('POST', "guardarImagenPerfil", $data);
    }

    public function guardarImagenPost($data){
        return $this->performRequest('POST', "guardarImagenPost", $data);
    }

}
