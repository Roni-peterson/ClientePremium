<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Painel de Clientes</title>
    <meta http-equiv="refresh" content="5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body class="min-h-screen bg-cover bg-center">

    <!-- Seção da Navbar -->
    <div class="w-full">
        <nav class="shadow px-6 flex items-center justify-between text-white w-full" style="height: 80px; background-color: #1e3a8a;">
            <div class="flex items-center w-full">
                <img src="{{ asset('images/logo_painel.png') }}" alt="Logo" class="ml-[100px]" style="width: 6%; height: auto;">
                <p class="flex-1 text-center text-xl font-bold">Painel de Clientes</p>
            </div>
        </nav>
    </div>

    <!-- Seção do conteúdo -->
    <div class="p-6 max-w-6xl mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-white">Lista de Clientes</h1>

        <!-- Sua tabela ou conteúdo aqui -->

    </div>

</body>

</html>
