<!-- resources/views/layouts/dli_mobile.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente Premium - Suplementos (Mobile)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="font-sans">

    <!-- Seção 1: Imagem com logo (com botão dentro, fixo só nesta seção) -->
    <div class="w-full h-screen bg-no-repeat bg-cover bg-center"
        style="background-image: url('{{ asset('images/img_suplementos1.png') }}');">

        <!-- Botão posicionado no fim da seção -->
        <a href="javascript:void(0);" onclick="scrollToForm()"
            class="absolute bottom-4 left-1/2 transform -translate-x-1/2 px-6 py-3 bg-[#fedf06] text-gray-800 font-semibold rounded-lg shadow-md hover:brightness-110 transition duration-200 z-10">
            Cadastrar
        </a>
    </div>

    <!-- Seção 2: Formulário -->
    <div id="formulario"
        class="w-full h-screen bg-no-repeat bg-cover bg-top flex items-center justify-center"
        style="background-image: url('{{ asset('images/img_suplementos2.png') }}');">

        <!-- Formulário com rolagem interna e altura máxima -->
        <div class="w-[360px] max-h-[75vh] overflow-y-auto bg-white rounded-lg shadow-md p-4 justify-center">

            @include('layouts.formSuplementos')
        </div>

    </div>

    <script>
        // Função para rolar suavemente até a Seção 2
        function scrollToForm() {
            var formulario = document.getElementById('formulario');
            // Mostrar a Seção 2 antes de rolar até ela
            formulario.style.display = 'block';
            formulario.scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>

</body>

</html>