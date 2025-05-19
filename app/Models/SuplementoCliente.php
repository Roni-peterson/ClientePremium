<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuplementoCliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'classificacao_treino',
        'tempo_academia',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
