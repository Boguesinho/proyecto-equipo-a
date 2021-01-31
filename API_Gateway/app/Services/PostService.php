<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;
use function Symfony\Component\Translation\t;

class PostService{

    use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.posts.base_uri');
        $this->secret = config('services.posts.secret');
    }

    //Likes
    public function addLike($idPost, $idUsuario){
        return $this->performRequest('POST', "{$idPost}/{$idUsuario}/addLike");
    }

    public function deleteLike($idPost, $idUsuario){
        return $this->performRequest('DELETE', "{$idPost}/{$idUsuario}/deleteLike");
    }

    public function getNumLikes($idPost){
        return $this->performRequest('POST', "{$idPost}/addLike");
    }

    //Comentarios
    public function addComentario($data, $idPost, $idUsuario){
        return $this->performRequest('POST', "{$idPost}/{$idUsuario}/addComentario", $data);
    }

    public function editComentario ($data, $idPost, $idUsuario){
        return $this->performRequest('PUT', "{$idPost}/{$idUsuario}/editComentario", $data);
    }

    public function deleteComentario($idPost, $idUsuario){
        return $this->performRequest('DELETE', "{$idPost}/{$idUsuario}/deleteComentario");
    }

    public function getComentario($idPost){
        return $this->performRequest('GET', "{$idPost}/getComentario");
    }


    //Posts
    public function createPost($idUsuario, $data){
        return $this->performRequest('POST', "createPost/{$idUsuario}", $data);
    }

    public function misPost($idUsuario){
        return $this->performRequest('GET', "misPosts/{$idUsuario}");
    }

    public function editPost($data, $idPost){
        return $this->performRequest('PUT', "editPost/{$idPost}", $data);
    }

    public function deletePost($idPost){
        return $this->performRequest('DELETE', "deletePost/{$idPost}");
    }

    public function getPost($idPost){
        return $this->performRequest('GET', "getPost/{$idPost}");

    }

}


