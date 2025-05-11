<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function index()
    {
        return Pagamento::all();
    }

    public function show($id)
    {
        return Pagamento::findOrFail($id);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'inscricao_id' => 'required|integer|exists:inscricaos,id',
            'valor' => 'required|numeric',
            'metodo_pagamento' => 'required|string',
            'status' => 'required|string',
            'data' => 'required|date',
        ]);

        return Pagamento::create($validated);

    }

    public function update(Request $request, $id)
    {
        $pagamento = Pagamento::findOrFail($id);
        $pagamento->update($request->all());

        return $pagamento;
    }

    public function destroy($id)
    {
        return Pagamento::destroy($id);
    }
}
