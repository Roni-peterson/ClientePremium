<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }

    public function dadoCampanha()
    {
        return $this->hasOne(DadoCampanha::class);
    }

    protected $fillable = [
        'cpf',
        'nome',
        'email',
        'telefone',
        'data_nascimento',
        'genero',
    ];
}