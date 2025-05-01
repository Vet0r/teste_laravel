<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'evento_id',
        'data_inscricao',
        'status', // exemplo: 'pendente', 'confirmado', 'cancelado'
    ];

    public function usuario()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function evento()
    {
        return $this->belongsTo(\App\Models\Evento::class);
    }

    public function pagamento()
    {
        return $this->hasOne(\App\Models\Pagamento::class);
    }

}
