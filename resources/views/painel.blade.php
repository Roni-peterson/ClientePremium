<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <script>
        setTimeout(function() {
            window.location.reload();
        }, 5000); // 5000 milissegundos = 5 segundos
    </script>
    <meta charset="UTF-8">
    <title>Painel de Clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body class="min-h-screen bg-cover bg-center">

    <!-- Navbar centralizada e do tamanho do conteúdo -->
    <div class="w-full h-[80px]">
        <nav class="w-full h-[80px] shadow flex items-center justify-center text-white px-6" style="background-color: #1e3a8a;">

            <!-- Div para o texto -->
            <div class="flex items-center flex-grow-0">
                <a class="text-xl font-semibold whitespace-nowrap">Painel de Controle</a>
            </div>

            <!-- Div para as imagens -->
            <div class="flex items-center justify-center gap-6">
                <img src="{{ asset('images/logo_painel.png') }}" alt="Logo Painel" style="width: 6%; height: auto;">
                <img src="{{ asset('images/logo_clientePremium.png') }}" alt="Logo Cliente Premium" style="width: 6%; height: auto;">
            </div>

        </nav>
    </div>

    <!-- Seção do conteúdo -->
    <div class="p-6 max-w-full mx-auto"> <!-- Removido max-w-6xl para não limitar -->

        <!-- Indicadores -->
        <div class="py-12">
            <div class="text-white w-full max-w-7xl px-6 mx-auto"> <!-- Substituído container por w-full e max-w-7xl -->
                <div class="bg-[#1e3a8a] dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex justify-center gap-4">
                            <div class="bg-[#1e3a8a] w-1/3 h-24 rounded-2xl">
                                <h3 class="text-white text-center">Qtd. Novos Registros</h3>
                                <p class="text-center text-white mt-4 text-2xl">{{ $novosRegistros }}</p>
                            </div>
                            <div class="bg-[#1e3a8a] w-1/3 h-24 rounded-2xl">
                                <h3 class="text-white text-center">Qtd. Registros Atualizados</h3>
                                <p class="text-center text-white mt-4 text-2xl">{{ $registrosAtualizados }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabela -->
        <div class="py-12">
            <div class="text-white w-full max-w-7xl px-6 mx-auto">
                <div class="flex justify-end mb-4">
                    <a href="{{ route('clientes.exportar') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                        Exportar Clientes
                    </a>
                </div>
                <div class="bg-[#1e3a8a] dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-900 dark:text-white">
                        <div class="flex flex-col gap-4">
                            <div class="w-full h-[400px] mx-auto">
                                <table id="registros-datatable"
                                    class="w-full text-xs text-center text-white dark:text-white border border-gray-300 rounded-lg">
                                    <thead class="text-[11px] text-white uppercase bg-[#1e3a8a]">
                                        <tr>
                                            <th scope="col" class="px-2 py-2">#</th>
                                            <th scope="col" class="px-2 py-2">Nome</th>
                                            <th scope="col" class="px-2 py-2">Perfil</th>
                                            <th scope="col" class="px-2 py-2">Gênero</th>
                                            <th scope="col" class="px-2 py-2">Telefone</th>
                                            <th scope="col" class="px-2 py-2">Data Nascimento</th>
                                            <th scope="col" class="px-2 py-2">E-mail</th>
                                            <th scope="col" class="px-2 py-2">Data Cadastro</th>
                                            <th scope="col" class="px-2 py-2">Data Atualização</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-300 text-white bg-[#1e3a8a] dark:bg-gray-800 text-[11px]">
                                        @foreach ($clientes as $cliente)
                                        <tr>
                                            <td class="px-2 py-2 whitespace-nowrap">{{ $cliente->id }}</td>
                                            <td class="px-2 py-2 whitespace-nowrap">{{ $cliente->nome }}</td>
                                            <td class="px-2 py-2 whitespace-nowrap">
                                                {{ $cliente->dadocampanha->perfil ?? 'N/A' }}
                                            </td>
                                            <td class="px-2 py-2 whitespace-nowrap">{{ $cliente->genero }}</td>
                                            <td class="px-2 py-2 whitespace-nowrap">{{ $cliente->telefone }}</td>
                                            <td class="px-2 py-2 whitespace-nowrap">{{ \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') }}</td>
                                            <td class="px-2 py-2 whitespace-nowrap">{{ $cliente->email }}</td>
                                            <td class="px-2 py-2 whitespace-nowrap">{{ \Carbon\Carbon::parse($cliente->created_at)->format('d/m/Y H:i') }}</td>
                                            <td class="px-2 py-2 whitespace-nowrap">{{ \Carbon\Carbon::parse($cliente->updated_at)->format('d/m/Y H:i') }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Paginação -->
                                <div class="mt-4 text-white">
                                    {{ $clientes->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>