<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Organizador extends Model
{
    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
    ];
}
