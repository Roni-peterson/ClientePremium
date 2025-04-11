<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function index()
    {
        return view('campanha');
    }

    public function store(Request $request)

{

    $request->merge([
        'cpf' => preg_replace('/\D/', '', $request->cpf), // Remove tudo que não for número
    ]);

    // Verifica se já existe
    if (Cliente::where('cpf', $request->cpf)->exists()) {
        return redirect()->back()->with('error', 'Este CPF já foi cadastrado!');
    }
    // Cria o cliente
    $cliente = Cliente::create($request->only([
        'cpf',
        'nome',
        'email',
        'telefone',
        'data_nascimento',
        'genero',
    ]));

    // Cria o endereço relacionado ao cliente
    $cliente->endereco()->create([
        'cep' => $request->cep,
        'cidade' => $request->cidade,
        'rua' => $request->rua,
        'numero' => $request->numero,
        'bairro' => $request->bairro,
        'uf' => $request->uf,
    ]);

    // Cria os dados da campanha
    $cliente->dadocampanha()->create([
        'perfil' => $request->perfil,
        'detalhe_tentante' => $request->detalhe_tentante,
        'detalhe_gestante' => $request->detalhe_gestante,
        'mes_gestacao' => $request->mes_gestacao,
        'sexo_bebe' => $request->sexo_bebe,
        'nome_bebe' => $request->nome_bebe,
        'detalhe_mamae' => $request->detalhe_mamae,
        'faixa_etaria_bebe' => $request->faixa_etaria_bebe,
    ]);

    // Mensagem de sucesso
    session()->flash('success', 'Cliente cadastrado com sucesso!');
    return redirect('/painel');
}

    public function painel()
    {
        $clientes = Cliente::latest()->get();
        return view('painel', compact('clientes'));
    }
}
