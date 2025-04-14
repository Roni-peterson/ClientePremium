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

        // Verifica se o cliente já existe pelo CPF
        $cliente = Cliente::where('cpf', $request->cpf)->first();

        if ($cliente) {
            // Atualiza os dados existentes
            $cliente->update($request->only([
                'nome',
                'email',
                'telefone',
                'data_nascimento',
                'genero',
            ]));

            // Atualiza endereço
            $cliente->endereco()->updateOrCreate([], [
                'cep' => $request->cep,
                'cidade' => $request->cidade,
                'rua' => $request->rua,
                'numero' => $request->numero,
                'bairro' => $request->bairro,
                'uf' => $request->uf,
            ]);

            // Atualiza dados da campanha
            $cliente->dadocampanha()->updateOrCreate([], [
                'perfil' => $request->perfil,
                'detalhe_tentante' => $request->detalhe_tentante,
                'detalhe_gestante' => $request->detalhe_gestante,
                'mes_gestacao' => $request->mes_gestacao,
                'sexo_bebe' => $request->sexo_bebe,
                'nome_bebe' => $request->nome_bebe,
                'detalhe_mamae' => $request->detalhe_mamae,
                'faixa_etaria_bebe' => $request->faixa_etaria_bebe,
            ]);

            session()->flash('success', 'Dados atualizados com sucesso!');
        } else {
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

            session()->flash('success', 'Cliente cadastrado com sucesso!');
        }

        return redirect('/');
    }

    public function painel()
    {
        // Contagem de novos registros
        $novosRegistros = Cliente::where('created_at', '>=', now()->subDays(30))->count();

        // Contagem de registros atualizados
        $registrosAtualizados = Cliente::where('updated_at', '>=', now()->subDays(30))->count();

        // Recuperando todos os clientes
        $clientes = Cliente::with('dadocampanha')
            ->orderBy('id', 'asc')
            ->paginate(10);

        // Passando as variáveis para a view
        return view('painel', compact('clientes', 'novosRegistros', 'registrosAtualizados'));
    }
}
