<?php

namespace App\Http\Controllers;

use App\Models\Historia;
use Illuminate\Http\Request;


class HistoriaController extends Controller
{

    public function create(Request $request){
        $rules = [
            'ruta'=>'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
        $this->validate($request, $rules);

        if ($request->hasFile("ruta")) {
            $historia = new Historia();
            $historia->idUsuario = $request->user()->id;
            $historia->ruta = $request->file('ruta')->store('public/Stories');

            $historia->save();

            return response()->json([
                'message' => 'Historia creada con éxito'
            ]);
        }
    }

    public function getHistorias(Request $request){
        $historias = Historia::orderBy('desc')->get();
        return $historias;    
    }
}