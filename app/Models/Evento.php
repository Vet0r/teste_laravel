<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    public function organizador()
    {
        return $this->belongsTo(\App\Models\User::class, 'organizador_id');
    }

    public function inscricoes()
    {
        return $this->hasMany(\App\Models\Inscricao::class);
    }
    protected $fillable = [
        'titulo',
        'descricao',
        'categoria',
        'data',
        'localizacao',
        'capacidade',
        'preco',
        'organizador_id',
        'imagem',
    ];

}
