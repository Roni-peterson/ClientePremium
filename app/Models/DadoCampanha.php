<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadoCampanha extends Model
{
    use HasFactory;
    protected $table = 'dadoCampanha';
    protected $fillable = [
        'cliente_id',
        'perfil',
        'detalhe_tentante',
        'detalhe_gestante',
        'mes_gestacao',
        'sexo_bebe',
        'nome_bebe',
        'detalhe_mamae',
        'faixa_etaria_bebe',
        'detalhe_outros',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
