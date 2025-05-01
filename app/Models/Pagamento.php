<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = [
        'inscricao_id',
        'valor',
        'metodo_pagamento', // exemplo: 'cartao', 'pix', 'boleto'
        'status', // exemplo: 'pago', 'pendente', 'reembolsado'
        'data',
    ];

    public function inscricao()
    {
        return $this->belongsTo(\App\Models\Inscricao::class);
    }

}
