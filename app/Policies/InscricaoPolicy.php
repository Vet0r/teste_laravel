<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Inscricao;

class InscricaoPolicy
{
    public function viewAny(User $user)
    {
        // Qualquer usuário pode visualizar suas próprias inscrições
        return in_array($user->tipo, ['inscrito', 'organizador', 'administrador']);
    }

    public function view(User $user, Inscricao $inscricao)
    {
        // Usuário pode visualizar se for o dono da inscrição ou organizador
        return $user->id === $inscricao->user_id || $user->tipo === 'organizador' || $user->tipo === 'administrador';
        ;
    }

    public function create(User $user)
    {
        // Apenas inscritos podem criar inscrições
        return $user->tipo === 'inscrito' || $user->tipo === 'administrador';
    }

    public function update(User $user, Inscricao $inscricao)
    {
        // Apenas organizadores podem atualizar inscrições
        return $user->tipo === 'organizador' || $user->tipo === 'administrador';
        ;
    }

    public function delete(User $user, Inscricao $inscricao)
    {
        // Apenas organizadores podem deletar inscrições
        return $user->tipo === 'organizador' || $user->tipo === 'administrador';
        ;
    }
}