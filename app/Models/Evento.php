<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    public function organizador()
    {
        return $this->belongsTo(Organizador::class);
    }
    protected $fillable = [
        'titulo',
        'descricao',
        'data',
        'localizacao',
        'capacidade',
        'preco',
        'organizador_id',
    ];

}
