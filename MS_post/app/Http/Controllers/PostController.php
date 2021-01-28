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

    public function misPosts(Request $request){
        $posts = Post::where('idUsuario', $request->user()->id)->get();
        return response()->json($posts);
    }

    /*
    public function getPostsCount(Request $request){
        $posts = Post::where('idUsuario', $request->user()->id)->get();
        return response()->json($posts->count());
    }
    */

    public function createPost(Request $request, $ruta){
        $rules = [
            'descripcion'=>'required|string',
            'ruta'=>'required|string'
        ];
        $this->validate($request, $rules);

        $post = new Post();
        $post->idUsuario = $request->user()->id;
        $post->descripcion = $request->input('descripcion');

        $post->ruta = $ruta;
        $post->save();
        return response()->json([
            'message' => 'Post creado con éxito'
        ]);
    }

    public function editPost(Request $request, int $idpost, $ruta){
        $rules = [
            'descripcion'=>'required|string',
            'ruta'=>'required|string'
        ];
        $this->validate($request, $rules);

        $post=Post::findOrFail($idpost);
        $post->descripcion = $request->input('descripcion');
        $post->ruta = $ruta;
        
        $post->save();

        return response()->json([
            'message' => 'Post editado con éxito'
        ]);
    }

    public function deletePost(int $idpost){
        $post=Post::findOrFail($idpost);
        
        return response()->json([
            'message' => 'Post eliminado con éxito'
        ]);

    }

    public function getImagenPost($ruta){
        $imagen = Post::findOrFail($ruta);
        return $imagen->ruta;
    }

}
