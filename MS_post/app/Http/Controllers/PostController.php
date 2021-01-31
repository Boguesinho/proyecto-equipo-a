<?php

namespace App\Http\Controllers;


//use App\Models\Multimedia;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Whoops\Run;

class PostController extends Controller
{

    public function misPosts($idUsuario){
        $posts = Post::where('idUsuario', $idUsuario)->get();
        return response()->json($posts);
    }

    public function createPost(Request $request, $idUsuario){
        $post = new Post();
        $post->idUsuario = $idUsuario;
        $post->descripcion = "prueba";
        $post->ruta = $request->input('original');
        $post->save();
        return response()->json([
            'message' => 'Post creado con éxito',
            'ruta' => "$post->ruta",
            'descripcion' => "$post->descripcion"
        ]);
    }

    public function editPost(Request $request, $idpost){
        $rules = [
            'descripcion'=>'required|string'
        ];
        $this->validate($request, $rules);

        $post=Post::findOrFail($idpost);
        $post->descripcion = $request->input('descripcion');

        $post->save();

        return response()->json([
            'message' => 'Post editado con éxito'
        ]);
    }

    public function deletePost($idpost){
        $post=Post::findOrFail($idpost);
        $post->delete();

        return response()->json([
            'message' => 'Post eliminado con éxito'
        ]);

    }

    public function getPost($idPost){
        $post = Post::findOrFail($idPost);
        return $post;
    }

}
