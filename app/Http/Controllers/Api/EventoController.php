<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(Request $request)
    {

        if ($request->has('organizadorId')) {
            $query = Evento::query();
            $query->where('organizador_id', $request->input('organizadorId'));
            return $query->get();
        }
        return Evento::all();
    }

    public function show($id)
    {
        return Evento::findOrFail($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string',
            'descricao' => 'required|string',
            'data' => 'required|date',
            'categoria' => 'required|in:Tecnologia,Música,Artes,Esporte,Comida,Negócios',
            'localizacao' => 'required|string',
            'organizador_id' => 'required|integer|exists:users,id',
            'capacidade' => 'required|integer',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|string',
        ]);

        return Evento::create($data);
    }

    public function update(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);
        $evento->update($request->all());
        return $evento;
    }

    public function destroy($id)
    {
        Evento::findOrFail($id)->delete();
        return response()->json(['message' => 'Deletado com sucesso']);
    }
}
