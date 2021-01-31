<?php

namespace App\Http\Controllers;

use App\Models\Multimedia;
use App\Services\PostService;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;



class PostController extends Controller
{
    use ApiResponser;

    public $post_service;

    public function __construct(PostService $post_service)
    {
        $this->post_service = $post_service;
    }

    //Post
    public function createPost(Request $request){
        $rules = [
            'descripcion' => 'required|string',
            'ruta'=>'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
        $this->validate($request, $rules);
        $idUsuario = $request->user()->id;
        if ($request->hasFile("ruta")) {
            $imagen = new Multimedia();
            $imagen->ruta = $request->file('ruta')->store('public/Posts');

            $data = response()->json([
                $request->descripcion,
                $imagen->ruta

            ]);
            return $this->successResponse($this->post_service->createPost($idUsuario, $data));
        }
        return response()->json([
            "message" => "no se subió nada aaa"
        ]);
    }

    public function misPosts(Request $request){
        $idUsuario = $request->user()->id;
        return $this->successResponse($this->post_service->misPost($idUsuario));
    }

    public function editPost(Request $request, $idPost){
        return $this->successResponse($this->post_service->editPost($request->all('descripcion'), $idPost));
    }

    public function deletePost($idPost){
        return $this->successResponse($this->post_service->deletePost($idPost));
    }

    public function getPost($idPost){
        return $this->successResponse($this->post_service->getPost($idPost));
    }

    //Like
    public function addLike(Request $request, $idPost){
        $idUsuario = $request->user()->id;
        return $this->successResponse($this->post_service->addLike($idPost, $idUsuario));
    }

    public function deleteLike(Request $request, $idPost){
        $idUsuario = $request->user()->id;
        return $this->successResponse($this->post_service->deleteLike($idPost, $idUsuario));
    }

    public function getNumLikes($idPost){
        return $this->successResponse($this->post_service->getNumLikes($idPost));
    }

    //Comentarios
    public function addComentario(Request $request, $idPost){
        $idUsuario = $request->user()->id;
        return $this->successResponse($this->post_service->addComentario($idPost, $idUsuario, $request->all('comentario')));
    }

    public function editComentario(Request $request, $idPost){
        $idUsuario = $request->user()->id;
        return $this->successResponse($this->post_service->editComentario($idPost, $idUsuario, $request->all('comentario')));
    }

    public function deleteComentario(Request $request, $idPost){
        $idUsuario = $request->user()->id;
        return $this->successResponse($this->post_service->deleteLike($idPost, $idUsuario));
    }

    public function getComentarios($idPost){
        return $this->successResponse($this->post_service->getComentarios($idPost));
    }


}
