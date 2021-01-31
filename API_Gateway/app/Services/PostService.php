<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class PostService{

    use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.posts.base_uri');
        $this->secret = config('services.posts.secret');
    }

    public function createPost($idUsuario, $data){
        return $this->performRequest('POST', "createPost/{$idUsuario}", $data);
    }



}


