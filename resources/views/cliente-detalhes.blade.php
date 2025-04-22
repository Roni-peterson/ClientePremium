@extends('layouts.app')

@section('title', 'Detalhes do Cliente')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Dados do Cliente -->
        <div class="bg-orange-300 shadow-xl rounded-lg p-4">
            <h3 class="text-xl font-semibold text-[#1e3a8a] mb-4">Dados do Cliente</h3>
            <div class="space-y-2 text-sm text-gray-800">
                <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
                <p><strong>CPF:</strong> {{ $cliente->cpf }}</p>
                <p><strong>Email:</strong> {{ $cliente->email }}</p>
                <p><strong>Telefone:</strong> {{ $cliente->telefone }}</p>
                <p><strong>Data de Nascimento:</strong> {{ \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') }}</p>
                <p><strong>Gênero:</strong> {{ $cliente->genero }}</p>
            </div>
        </div>

        <!-- Endereço -->
        <div class="bg-orange-300 shadow-xl rounded-lg p-4">
            <h3 class="text-xl font-semibold text-[#1e3a8a] mb-4">Endereço</h3>
            <div class="space-y-2 text-sm text-gray-800">
                <p><strong>Rua:</strong> {{ $cliente->endereco->rua }}</p>
                <p><strong>Número:</strong> {{ $cliente->endereco->numero }}</p>
                <p><strong>Bairro:</strong> {{ $cliente->endereco->bairro }}</p>
                <p><strong>Cidade:</strong> {{ $cliente->endereco->cidade }}</p>
                <p><strong>UF:</strong> {{ $cliente->endereco->uf }}</p>
                <p><strong>CEP:</strong> {{ $cliente->endereco->cep }}</p>
            </div>
        </div>

        <!-- Dados da Campanha -->
        <div class="bg-orange-300 shadow-xl rounded-lg p-4">
            <h3 class="text-xl font-semibold text-[#1e3a8a] mb-4">Dados da Campanha</h3>
            <div class="space-y-2 text-sm text-gray-800">
                <p><strong>Perfil:</strong> {{ $cliente->dadocampanha->perfil }}</p>
                <p><strong>Detalhe Outros:</strong> {{ $cliente->dadocampanha->detalhe_outros }}</p>
                <p><strong>Detalhe Tentante:</strong> {{ $cliente->dadocampanha->detalhe_tentante }}</p>
                <p><strong>Detalhe Gestante:</strong> {{ $cliente->dadocampanha->detalhe_gestante }}</p>
                <p><strong>Mês de Gestação:</strong> {{ $cliente->dadocampanha->mes_gestacao }}</p>
                <p><strong>Sexo do Bebê:</strong> {{ $cliente->dadocampanha->sexo_bebe }}</p>
                <p><strong>Nome do Bebê:</strong> {{ $cliente->dadocampanha->nome_bebe }}</p>
                <p><strong>Detalhe Mamãe:</strong> {{ $cliente->dadocampanha->detalhe_mamae }}</p>
                <p><strong>Faixa Etária do Bebê:</strong> {{ $cliente->dadocampanha->faixa_etaria_bebe }}</p>
            </div>
        </div>
    </div>
    <!-- Botão com a cor personalizada -->
    <a href="{{ url('/painel-mamaepremiada') }}" class="inline-block px-6 py-2 text-white rounded-lg shadow-md text-sm font-semibold mt-4" style="background-color: #1e3a8a;">
        ← Voltar
    </a>
    @endsection