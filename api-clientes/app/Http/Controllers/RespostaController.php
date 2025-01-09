<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resposta;

class RespostaController extends Controller
{
    public function index(){
        return Resposta::all();
    }

    public function show($id){
        $resposta = Resposta::find($id);

        if(!$resposta){
            return response(['erro' => 'Resposta nao encontrada'], 404);
        }
        return response()->json([$resposta]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'texto_resposta' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'pergunta_id' => 'required|exists:perguntas,id'
        ]);

        $resposta = Resposta::create($validated);

        return response()->json($resposta, 201);
    }

    public function destroy($id){
        $resposta = Resposta::find($id);

        if(!$resposta){
            return response(['erro' => 'Resposta nao encontrada'], 404);
        }

        $resposta->delete();

        return response(['sucesso' => 'Resposta apagada']);
    }
}
