<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RespostaCliente;

class RespostaClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return RespostaCliente::all();
    }

    public function store(Request $request){
        $validated = $request->validate([
            'cliente_id' => 'required|exists:cliente, id',
            'resposta_id' => 'required|exists:resposta, id',
        ]);

        $resposta_cliente = RespostaCliente::create($validated);

        return response()->json($resposta_cliente, 201);
    }

    public function show(string $id){
        $resposta_cliente = RespostaCliente::find($id);

        if(!$resposta_cliente){
           return response(['erro' => 'Resposta nao encontrada'], 404);
        }

        return response()->json($resposta_cliente);
    }

    public function destroy(string $id){
        $resposta_cliente = RespostaCliente::find($id);

        if(!$resposta_cliente){
            return response(['erro' => 'Resposta do Cliente nao encontrada'], 404);
        }

        $resposta_cliente->delete();

        return response(['sucesso' => 'Resposta apagada']);
    }
}
