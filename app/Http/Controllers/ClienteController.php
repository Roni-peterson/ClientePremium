<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ClienteController extends Controller
{
    public function index()
    {
        return view('campanha');
    }

    public function store(Request $request)
    {
        $request->validate([
            'data_nascimento' => 'required|date|before_or_equal:2010-01-01',
        ], [
            'data_nascimento.after_or_equal' => 'A data de nascimento deve ser a partir de 01/01/2010.',
        ]);

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
            $cliente->dadocampanha()->updateOrCreate(
                ['cliente_id' => $cliente->id], // ← chave de relacionamento
                [
                    'perfil' => $request->perfil,
                    'detalhe_outros' => $request->detalhe_outros,
                    'detalhe_tentante' => $request->detalhe_tentante,
                    'detalhe_gestante' => $request->detalhe_gestante,
                    'mes_gestacao' => $request->mes_gestacao,
                    'sexo_bebe' => $request->sexo_bebe,
                    'nome_bebe' => $request->nome_bebe,
                    'detalhe_mamae' => $request->detalhe_mamae,
                    'faixa_etaria_bebe' => $request->faixa_etaria_bebe,
                ]
            );

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
                'detalhe_outros' => $request->detalhe_outros,
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
        // Contagem de novos registros (últimos 5 dias)
        $novosRegistros = Cliente::where('created_at', '>=', now()->subDays(5))->count();

        // Contagem de registros atualizados (últimos 3 dias)
        $registrosAtualizados = Cliente::where('updated_at', '>=', now()->subDays(3))->count();

        // Total de registros
        $totalRegistros = Cliente::count();

        // Contagem por perfil
        $registrosPorPerfil = \App\Models\DadoCampanha::select('perfil', DB::raw('count(*) as total'))
            ->groupBy('perfil')
            ->pluck('total', 'perfil');

        // Recuperando todos os clientes com dados da campanha
        $clientes = Cliente::with('dadocampanha')
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('painel', compact(
            'clientes',
            'novosRegistros',
            'registrosAtualizados',
            'totalRegistros',
            'registrosPorPerfil'
        ));
    }

    public function mostrar($id)
    {
        $cliente = Cliente::with(['endereco', 'dadocampanha'])->findOrFail($id);

        return view('cliente-detalhes', compact('cliente'));
    }

    public function exportarCsv(): StreamedResponse
    {
        $clientes = Cliente::with('dadocampanha')->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=clientes.csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['ID', 'Nome', 'Perfil', 'Gênero', 'Telefone', 'Data Nascimento', 'Email', 'Data Cadastro', 'Data Atualização'];

        $callback = function () use ($clientes, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($clientes as $cliente) {
                fputcsv($file, [
                    $cliente->id,
                    $cliente->nome,
                    $cliente->dadocampanha->perfil ?? 'N/A',
                    $cliente->genero,
                    $cliente->telefone,
                    \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y'),
                    $cliente->email,
                    \Carbon\Carbon::parse($cliente->created_at)->format('d/m/Y H:i'),
                    \Carbon\Carbon::parse($cliente->updated_at)->format('d/m/Y H:i'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
