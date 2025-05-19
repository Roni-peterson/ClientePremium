<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <title>Cliente Premium - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen flex font-sans">
    <!-- Lado Esquerdo -->
    <div class="w-1/3 bg-white flex items-center justify-center">
        <div class="w-full h-full bg-blue-600 flex items-center justify-center p-8 rounded-tr-[250px] rounded-br-[450px]">
            <div class="justify-center">
                <img src="{{ asset('images/logo_Cliente_premium_login.png') }}" alt="Logo Cliente Premium" class="max-w-xs" />
            </div>
        </div>
    </div>

    <!-- Lado Direito (agora com largura igual) -->
    <div class="w-2/3 bg-white flex items-center justify-center p-8">
        <div class="w-full flex items-center justify-center">
            <div>
                @include('layouts.form')
            </div>
        </div>
    </div>
</body>

</html>