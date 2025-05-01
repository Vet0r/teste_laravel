<?php

namespace App\Providers;

use App\Models\Evento;
use App\Models\Inscricao;
use App\Models\Pagamento;
use App\Policies\InscricaoPolicy;
use App\Policies\PagamentoPolicy;
use App\Policies\EventoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Evento::class => EventoPolicy::class,
        Inscricao::class => InscricaoPolicy::class,
        Pagamento::class => PagamentoPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}