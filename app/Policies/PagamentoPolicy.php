<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pagamento;

class PagamentoPolicy
{
    public function viewAny(User $user)
    {
        // Qualquer usuário pode visualizar seus próprios pagamentos
        return in_array($user->tipo, ['inscrito', 'organizador', 'administrador']);
    }

    public function view(User $user, Pagamento $pagamento)
    {
        // Usuário pode visualizar se for o dono do pagamento ou organizador
        return $user->id === $pagamento->user_id || $user->tipo === 'organizador' || $user->tipo === 'administrador';
        ;
    }

    public function create(User $user)
    {
        // Apenas inscritos podem criar pagamentos
        return $user->tipo === 'inscrito' || $user->tipo === 'administrador';
    }

    public function update(User $user, Pagamento $pagamento)
    {
        // Apenas organizadores podem atualizar pagamentos
        return $user->tipo === 'organizador' || $user->tipo === 'administrador';
    }

    public function delete(User $user, Pagamento $pagamento)
    {
        // Apenas organizadores podem deletar pagamentos
        return $user->tipo === 'organizador' || $user->tipo === 'administrador';
    }
}