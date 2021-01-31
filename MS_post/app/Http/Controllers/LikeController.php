<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;


class LikeController extends Controller
{
    public function addLike ($idPost, $idUsuario){
        $like = new Like();
        $like->idUsuario = $idUsuario;
        $like->idPost = $idPost;
        $like->save();

        return response()->json([
            'message' => 'Like guardado con éxito'
        ]);

    }

    public function deleteLike ($idPost, $idUsuario){

        $like=Like::where('idPost', $idPost)->where('idUsuario', $idUsuario)->first();
        $like->delete();

        return response()->json([
            'message' => 'Like eliminado con éxito'
        ]);
    }

    public function getNumLikes ($idPost){
        $like = Like::where('idPost', $idPost)->count()->get();
        return response()->json($like);
    }


}
