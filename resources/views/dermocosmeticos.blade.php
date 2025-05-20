<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Cliente Premium - Dermocosméticos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        window.onload = function() {
            var mobileRoute = "{{ route('dermocosmeticos.mobile') }}";
            var desktopRoute = "{{ route('dermocosmeticos.desktop') }}";

            if (window.innerWidth <= 768) {
                window.location.href = mobileRoute;
            } else {
                window.location.href = desktopRoute;
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
