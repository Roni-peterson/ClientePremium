<!-- resources/views/dli_desktop.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR" class="h-full">

<head>
    <meta charset="UTF-8" />
    <title>Cliente Premium - DLI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen w-screen font-sans bg-gray-100 overflow-hidden">
    <div class="flex h-screen w-full" 
         style="background-image: url('{{ asset('images/img_completo_dli.png') }}'); 
                background-size: cover; 
                background-repeat: no-repeat; 
                background-position: left center;">
        
        <!-- Div "falsa" que ocupa 60% da tela -->
        <div class="w-3/5 h-full"></div>

        <!-- Formulário (lado direito, 40%) -->
        <div class="w-2/5 flex items-center justify-center z-10">
            <div class="w-full max-w-lg px-6 py-8 rounded-lg bg-white shadow-md">
                @include('layouts.formDLI')
            </div>
        </div>
    </div>
</body>

</html>
