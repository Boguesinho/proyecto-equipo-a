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


}
