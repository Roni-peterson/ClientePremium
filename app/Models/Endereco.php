<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'endereco';
    protected $fillable = ['cliente_id', 'cep', 'cidade', 'rua', 'numero', 'bairro', 'uf'];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
