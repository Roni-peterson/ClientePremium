<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Cliente Premium - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Verifica largura da tela e redireciona para o layout apropriado
        window.onload = function() {
            var mobileRoute = "{{ route('dli.mobile') }}"; // Gera a URL para a versão mobile
            var desktopRoute = "{{ route('dli.desktop') }}"; // Gera a URL para a versão desktop

            if (window.innerWidth <= 768) {
                window.location.href = mobileRoute; // Redireciona para a versão mobile
            } else {
                window.location.href = desktopRoute; // Redireciona para a versão desktop
            }
        };
    </script>
</head>
<body class="bg-gray-100">
    <noscript>
        <div class="text-center mt-10 text-red-500">
            Por favor, ative o JavaScript para acessar este conteúdo.
        </div>
    </noscript>
</body>
</html>
