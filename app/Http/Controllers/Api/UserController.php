<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email|unique:users',
            'senha' => 'required|string|min:6',
            'tipo' => 'required|in:organizador,inscrito,administrador',
        ]);

        $validated['password'] = bcrypt($validated['senha']);
        unset($validated['senha']);

        return User::create($validated);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return $user;
    }

    public function destroy($id)
    {
        return User::destroy($id);
    }
}
