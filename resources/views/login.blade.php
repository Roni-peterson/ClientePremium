<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cliente Premium</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Lora:wght@600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen flex flex-col md:flex-row bg-white">
    <!-- Lado esquerdo (logo) -->
    <div class="w-full md:w-[50%] bg-white flex flex-col justify-center items-center p-8 md:p-0 h-[50vh] md:h-full">
        <div class="w-full max-w-lg overflow-y-auto p-6 rounded-xl shadow-lg bg-[#E6E7E8]">

            <!-- Etapa CPF -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('images/logo_indiana.png') }}" alt="Logo" class="w-2/3 md:w-3/4 max-w-xs">
            </div>
            @if(!session('etapa') || session('etapa') === 'cpf')
            <form method="POST" action="{{ route('verificar.cpf') }}" class="space-y-4" id="cpfForm">
                @csrf
                @if(session('mensagem'))
                <div class="bg-red-100 text-red-700 p-2 rounded">{{ session('mensagem') }}</div>
                @endif
                <input type="text" name="cpf" placeholder="Digite seu CPF" class="w-full p-3 border rounded-lg" required>
                <button type="submit" class="w-full bg-[#072AC8] text-white p-3 rounded-lg hover:bg-blue-800">Verificar se sou Cliente Premium</button>
            </form>
            @endif

            <!-- Etapa escolher método -->
            @if(session('etapa') === 'escolher_metodo')
            <form method="POST" action="{{ route('escolher.metodo') }}" class="space-y-4">
                @csrf
                <h2 class="text-xl font-semibold text-center mb-4">Como você quer receber o código?</h2>

                @php
                $cliente = session('cliente');
                $telefone = $cliente->telefone ?? '';
                $email = $cliente->email ?? '';
                $telefoneMascarado = substr($telefone, 0, 3) . '****' . substr($telefone, -4);
                $emailMascarado = substr($email, 0, 3) . '***@' . substr($email, strpos($email, '@') + 1);
                @endphp

                <div class="grid grid-cols-1 gap-4">
                    <!-- Card para telefone -->
                    <label class="block p-4 border rounded-lg shadow-lg cursor-pointer hover:bg-blue-100">
                        <input type="radio" name="metodo" value="telefone" required class="hidden">
                        <div class="text-center">
                            <h3 class="font-semibold">Receber por Telefone</h3>
                            <p class="text-sm text-gray-500">{{ $telefoneMascarado }}</p>
                        </div>
                    </label>

                    <!-- Card para email -->
                    <label class="block p-4 border rounded-lg shadow-lg cursor-pointer hover:bg-blue-100">
                        <input type="radio" name="metodo" value="email" required class="hidden">
                        <div class="text-center">
                            <h3 class="font-semibold">Receber por Email</h3>
                            <p class="text-sm text-gray-500">{{ $emailMascarado }}</p>
                        </div>
                    </label>
                </div>

                <button type="submit" class="w-full bg-blue-900 text-white p-3 rounded-lg hover:bg-blue-800">Escolher método</button>
            </form>
            @endif

            <!-- Etapa confirmação dos últimos 4 dígitos ou email completo -->
            @if(session('etapa') === 'confirmacao')
            <form method="POST" action="{{ route('confirmar.codigo') }}" class="space-y-4">
                @csrf
                <h2 class="text-xl font-semibold text-center mb-4">Confirme sua escolha</h2>

                @php
                $metodo = session('metodo');
                $cliente = session('cliente');
                $telefone = $cliente->telefone ?? '';
                $email = $cliente->email ?? '';
                $telefoneMascarado = substr($telefone, 0, 3) . '****' . substr($telefone, -4);
                $emailMascarado = substr($email, 0, 3) . '***@' . substr($email, strpos($email, '@') + 1);
                @endphp

                <!-- Verificando se o método escolhido foi telefone ou email -->
                @if($metodo == 'telefone')
                <p>Digite os últimos 4 dígitos do seu telefone: <strong>{{ $telefoneMascarado }}</strong></p>
                <input type="text" name="confirmacao" placeholder="Últimos 4 dígitos do telefone" class="w-full p-3 border rounded-lg" required>
                @elseif($metodo == 'email')
                <p>Digite seu email completo: <strong>{{ $emailMascarado }}</strong></p>
                <input type="text" name="confirmacao" placeholder="Email completo" class="w-full p-3 border rounded-lg" required>
                @endif

                <button type="submit" class="w-full bg-blue-900 text-white p-3 rounded-lg hover:bg-blue-800">Confirmar</button>
            </form>
            @endif

            <!-- Etapa código -->
            @if(session('etapa') === 'codigo')
            <form method="POST" action="{{ route('enviar.codigo') }}" class="space-y-4">
                @csrf
                <h2 class="text-xl font-semibold text-center mb-4">Digite o código enviado</h2>

                <input type="text" name="codigo" placeholder="Código de 4 dígitos" class="w-full p-3 border rounded-lg" required>

                <button type="submit" class="w-full bg-blue-900 text-white p-3 rounded-lg hover:bg-blue-800">Verificar</button>
            </form>
            @endif

            <!-- Etapa criar senha -->
            @if(session('etapa') === 'senha')
            <form method="POST" action="{{ route('criar.senha') }}" class="space-y-4">
                @csrf
                <h2 class="text-xl font-semibold text-center mb-4">Crie sua senha</h2>

                <input type="password" name="senha" placeholder="Nova senha" class="w-full p-3 border rounded-lg" required>
                @error('senha')
                <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror

                <input type="password" name="senha_confirmation" placeholder="Confirme a senha" class="w-full p-3 border rounded-lg" required>
                @error('senha_confirmation')
                <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror

                <button type="submit" class="w-full bg-blue-900 text-white p-3 rounded-lg hover:bg-blue-800">Salvar senha</button>
            </form>
            @endif

            <!-- Etapa login final -->
            @if(session('etapa') === 'login-final')
            <form method="POST" action="{{ route('login.final') }}" class="space-y-4">
                @csrf
                <h2 class="text-2xl font-semibold text-center mb-6">Login</h2>

                <input type="text" name="cpf" id="cpf" placeholder="CPF" class="w-full p-3 border rounded-lg" value="{{ old('cpf') }}" required>
                @error('cpf')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <input type="password" name="senha" placeholder="Senha" class="w-full p-3 border rounded-lg" required>

                <button type="submit" class="w-full bg-blue-900 text-white p-3 rounded-lg hover:bg-blue-800">Entrar</button>

                <!-- Esqueci minha senha -->
                <div class="text-right mt-2">
                    <a href="#" onclick="verificarCPF()" class="text-sm text-blue-600 hover:underline">Esqueci minha senha</a>
                </div>
            </form>

            <script>
                function verificarCPF() {
                    const cpf = document.getElementById('cpf').value;

                    if (!cpf) {
                        alert('Por favor, preencha seu CPF antes de continuar.');
                        return false; // Impede o envio do formulário
                    }

                    // Se o CPF estiver preenchido, chama a rota de recuperação de senha
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '{{ route("iniciar.recuperacao") }}';

                    // Cria um campo hidden com o CPF
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'cpf';
                    input.value = cpf;
                    form.appendChild(input);

                    // Adiciona o token CSRF ao formulário
                    const csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = '{{ csrf_token() }}';
                    form.appendChild(csrfToken);

                    // Envia o formulário
                    document.body.appendChild(form);
                    form.submit();
                }
            </script>

            @endif

            @if(session('etapa') === 'cadastro')
            <div class="space-y-4 animate-fade-in">
                <h2 class="text-xl font-bold text-gray-800">Cadastro Cliente Premium</h2>

                <form method="POST" action="{{ route('cadastrar.cliente') }}" class="space-y-2" id="formularioCadastroCompleto">
                    @csrf

                    <input type="hidden" name="cpf" value="{{ old('cpf', session('cpf_informado')) }}">

                    <div class="mb-1">
                        <input name="nome" placeholder="Nome completo" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
                    </div>

                    <div class="flex gap-4 mb-1">
                        <div class="flex-1">
                            <label for="data_nascimento" class="block text-xs font-medium text-gray-700">Data de nascimento</label>
                            <input name="data_nascimento" type="date" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 sm:text-sm" max="2010-01-01" required>
                        </div>

                        <div class="flex-1">
                            <label for="genero" class="block text-xs font-medium text-gray-700">Gênero</label>
                            <select name="genero" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 sm:text-sm" required>
                                <option value="">Gênero</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Outros">Outros</option>
                                <option value="NaoInformar">Não Informar</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-1 md:gap-4 mb-1">
                        <div class="flex-1">
                            <input name="cep" placeholder="00000-000" maxlength="9" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
                        </div>
                        <div class="flex-1">
                            <input name="cidade" placeholder="Cidade" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
                        </div>
                    </div>

                    <div class="mb-1">
                        <input name="rua" placeholder="Endereço (Rua)" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
                    </div>

                    <div class="flex flex-col md:flex-row gap-1 md:gap-4 mb-1">
                        <div class="flex-1 mb-1">
                            <input name="numero" placeholder="Número" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
                        </div>
                        <div class="flex-1">
                            <input name="bairro" placeholder="Bairro" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
                        </div>
                        <div class="flex-1">
                            <select name="uf" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 mb-1" required>
                                <option value="">UF</option>
                                @foreach (['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO'] as $uf)
                                <option value="{{ $uf }}">{{ $uf }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row gap-1 md:gap-4 mb-1">
                        <div class="flex-1 mb-1">
                            <input name="email" placeholder="Email" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
                        </div>
                        <div class="flex-1 mb-1">
                            <input name="telefone" placeholder="Telefone" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
                        </div>
                    </div>

                    <label class="flex items-center mt-4 mb-1">
                        <input type="checkbox" required class="mr-2">
                        <span>Li e aceito os <a href="/termos-de-uso" class="text-blue-600 underline">termos de uso</a></span>
                    </label>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 w-full md:w-auto">
                            Cadastrar
                        </button>
                        <a href="{{ route('login') }}" class="text-red-600 hover:underline text-sm ml-4">Cancelar</a>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>

    <!-- Lado direito (formulário) -->
    <div class="w-full md:w-[50%] bg-[#F58634] flex items-center justify-center p-6 h-[50vh] md:h-full md:rounded-l-full">
        <img src="{{ asset('images/logo_Cliente_premium_login.png') }}" alt="Logo" class="w-1/2 md:w-1/2">
    </div>
</body>

</html>