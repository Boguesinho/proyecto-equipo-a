<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComentarioController extends Controller
{
    public function addComentario (Request $request, $idUsuario, $idPost){
        $rules = [
            'comentario'=>'required|string'
        ];
        $this->validate($request, $rules);


        $comentario = new Comentario();
        $comentario->idUsuario = $idUsuario;
        $comentario->idPost = $idPost;
        $comentario->comentario = $request->input('comentario');

        $comentario->save();

        return response()->json([
            'message' => 'Comentario guardado con éxito',
            'comentario' => "$comentario->comentario"
        ]);

    }

    public function editComentario (Request $request, $idPost, $idUsuario){

        $rules = [
            'comentario'=>'required|string'
        ];
        $this->validate($request, $rules);

        $comentario=Comentario::where('idUsuario', $idUsuario)->where('idPost', $idPost );
        $comentario->comentario = $request->input('comentario');
        $comentario->save();

        return response()->json([
            'message' => 'Comentario editado con éxito'
        ]);

    }

    public function deleteComentario ($idPost, $idUsuario){

        $comentario=Comentario::where('idUsuario', $idUsuario)->where('idPost', $idPost)->first();
        $comentario->delete();

        return response()->json([
            'message' => 'Comentario eliminado con éxito'
        ]);

    }

    public function getComentarios ($idPost){
        $comentarios = Comentario::orderBy('created_at', 'desc')->where('idPost', $idPost)->get();
        return response()->json($comentarios);
    }

}
