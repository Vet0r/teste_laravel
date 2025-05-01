<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Inscricao;

class InscricaoPolicy
{
    public function viewAny(User $user)
    {
        return in_array($user->tipo, ['inscrito', 'organizador', 'administrador']);
    }

    public function view(User $user, Inscricao $inscricao)
    {
        return $user->id === $inscricao->user_id || $user->tipo === 'organizador' || $user->tipo === 'administrador';
        ;
    }

    public function create(User $user)
    {
        return $user->tipo === 'inscrito' || $user->tipo === 'administrador';
    }

    public function update(User $user, Inscricao $inscricao)
    {
        return $user->tipo === 'organizador' || $user->tipo === 'administrador';
        ;
    }

    public function delete(User $user, Inscricao $inscricao)
    {
        return $user->tipo === 'organizador' || $user->tipo === 'administrador';
        ;
    }
}