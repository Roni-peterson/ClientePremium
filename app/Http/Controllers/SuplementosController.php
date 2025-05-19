<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\SuplementoCliente;

class SuplementosController extends Controller
{
    // Redireciona com base no dispositivo
    public function redirectByDevice(Request $request)
    {
        $userAgent = $request->header('User-Agent');
        $isMobile = preg_match('/Mobile|Android|iPhone|iPad|iPod/i', $userAgent);

        return $isMobile
            ? redirect()->route('suplementos.mobile')
            : redirect()->route('suplementos.desktop');
    }

    // Versão desktop da página
    public function indexDesktop()
    {
        return view('layouts.suplementos_desktop');
    }

    // Versão mobile da página
    public function indexMobile()
    {
        return view('layouts.suplementos_mobile');
    }

    // Processamento do formulário de suplementos
    public function store(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string|max:14',
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'genero' => 'required|string',
            'cep' => 'required|string',
            'cidade' => 'required|string',
            'rua' => 'required|string',
            'numero' => 'required|string',
            'bairro' => 'required|string',
            'uf' => 'required|string|max:2',
            'email' => 'required|email',
            'telefone' => 'required|string',
            'classificacao_treino' => 'required|string',
            'tempo_academia' => 'required|string',
            'classificacao_profissional' => 'required|string',
        ]);

        // Verifica se o cliente já existe
        $cliente = Cliente::firstOrCreate(
            ['cpf' => $request->cpf],
            [
                'nome' => $request->nome,
                'data_nascimento' => $request->data_nascimento,
                'genero' => $request->genero,
                'email' => $request->email,
                'telefone' => $request->telefone,
            ]
        );

        // Cria ou atualiza o endereço do cliente
        Endereco::updateOrCreate(
            ['cliente_id' => $cliente->id],
            [
                'cep' => $request->cep,
                'cidade' => $request->cidade,
                'rua' => $request->rua,
                'numero' => $request->numero,
                'bairro' => $request->bairro,
                'uf' => $request->uf,
            ]
        );

        // Cria ou atualiza os dados de suplemento do cliente
        SuplementoCliente::updateOrCreate(
            ['cliente_id' => $cliente->id],
            [
                'classificacao_treino' => $request->classificacao_treino,
                'tempo_academia' => $request->tempo_academia,
                'classificacao_profissional' => $request->classificacao_profissional,
            ]
        );

        return back()->with('success', 'Formulário de suplementos enviado com sucesso!');
    }
}