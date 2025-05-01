<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pagamento;

class PagamentoPolicy
{
    public function viewAny(User $user)
    {
        return in_array($user->tipo, ['inscrito', 'organizador', 'administrador']);
    }

    public function view(User $user, Pagamento $pagamento)
    {
        return $user->id === $pagamento->user_id || $user->tipo === 'organizador' || $user->tipo === 'administrador';
        ;
    }

    public function create(User $user)
    {
        return $user->tipo === 'inscrito' || $user->tipo === 'administrador';
    }

    public function update(User $user, Pagamento $pagamento)
    {
        return $user->tipo === 'organizador' || $user->tipo === 'administrador';
    }

    public function delete(User $user, Pagamento $pagamento)
    {
        return $user->tipo === 'organizador' || $user->tipo === 'administrador';
    }
}