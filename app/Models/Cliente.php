<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // <- ESSA LINHA
use Illuminate\Notifications\Notifiable;

class Cliente extends Authenticatable // <- AQUI TAMBÉM
{
    use HasFactory, Notifiable;

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
