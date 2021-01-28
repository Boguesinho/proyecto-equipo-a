<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multimedia;
use Illuminate\Support\Facades\Storage;

class MultimediaController extends Controller
{


    public function getImagen($ruta){
        
        
    }

    public function guardarImagenPerfil(Request $request){
        $rules = [
            'ruta'=>'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
        $this->validate($request, $rules);

        if ($request->hasFile("ruta")) {
            
                $nuevamultimedia = new Multimedia();
                $nuevamultimedia->ruta = $request->file('ruta')->store('public/Profiles');
                $nuevamultimedia->save();
                return response()->json([
                    'message' => 'NUEVA Foto de perfil guardada con éxito'
                ]);
        }
        
    }

    public function guardarImagenPost(Request $request){
        $rules = [
            'ruta'=>'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
        $this->validate($request, $rules);

        if ($request->hasFile("ruta")) {
            
                $nuevamultimedia = new Multimedia();
                $nuevamultimedia->ruta = $request->file('ruta')->store('public/Posts');
                $nuevamultimedia->save();
                return response()->json([
                    'message' => 'NUEVA Foto de perfil guardada con éxito'
                ]);
        }
    }
}
