<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Inscricao;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        if ($user->tipo === 'administrador') {
            return Inscricao::all();
        }
        return Inscricao::where('user_id', $user->id)->get();
    }

    public function show($id)
    {
        return Inscricao::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'evento_id' => 'required|exists:eventos,id',
            'data_inscricao' => 'required|date',
            'status' => 'required|string',
        ]);

        return Inscricao::create($validated);
    }

    public function update(Request $request, $id)
    {
        $inscricao = Inscricao::findOrFail($id);
        $inscricao->update($request->all());

        return $inscricao;
    }

    public function destroy($id)
    {
        return Inscricao::destroy($id);
    }
}
