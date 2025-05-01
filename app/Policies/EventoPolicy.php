<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Evento;

class EventoPolicy
{
    public function viewAny(User $user)
    {
        return in_array($user->tipo, ['organizador', 'inscrito', 'administrador']);
    }

    public function view(User $user, Evento $evento)
    {
        return in_array($user->tipo, ['organizador', 'inscrito', 'administrador']);
    }

    public function create(User $user)
    {
        return $user->tipo === 'organizador' || $user->tipo === 'administrador';
        ;
    }

    public function update(User $user, Evento $evento)
    {
        return $user->tipo === 'organizador' || $user->tipo === 'administrador';
        ;
    }

    public function delete(User $user, Evento $evento)
    {
        return $user->tipo === 'organizador' || $user->tipo === 'administrador';
        ;
    }
}