<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Painel de Clientes')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Auto-reload a cada 5 segundos -->
    <script>
        setTimeout(function () {
            window.location.reload();
        }, 5000);
    </script>

    <style>
        body, html {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body class="min-h-screen bg-cover bg-center">

    <!-- Navbar -->
    <div class="w-full h-[80px]">
        <nav class="w-full h-[80px] shadow flex items-center justify-center text-white px-6" style="background-color: #1e3a8a;">
            <div class="flex items-center flex-grow-0">
                <a class="text-xl font-semibold whitespace-nowrap">Painel de Controle</a>
            </div>
            <div class="flex items-center justify-center gap-6">
                <img src="{{ asset('images/logo_painel.png') }}" alt="Logo Painel" style="width: 6%; height: auto;">
                <img src="{{ asset('images/logo_clientePremium.png') }}" alt="Logo Cliente Premium" style="width: 6%; height: auto;">
            </div>
        </nav>
    </div>

    <!-- Conteúdo da página -->
    <main class="p-6 max-w-full mx-auto">
        @yield('content')
    </main>

</body>
</html>