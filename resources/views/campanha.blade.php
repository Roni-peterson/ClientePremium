<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Campanha Mamãe Premiada</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bobby+Jones&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Childos+Arabic&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html,
        body {
            height: 100%;
            scroll-behavior: smooth;
        }

        .font-bobby {
            font-family: 'Bobby Jones', sans-serif;
        }

        .font-childos {
            font-family: 'Childos Arabic', sans-serif;
        }

        @media (max-width: 768px) {

            input,
            select {
                padding: 0.5rem !important;
                /* reduz altura */
                font-size: 0.75rem !important;
                /* reduz tamanho da fonte */
            }

            .label-mobile {
                display: block;
                font-size: 0.75rem;
                font-weight: 500;
                margin-bottom: 0.2rem;
                color: #4B5563;
                /* gray-700 */
            }
        }

        @media (min-width: 769px) {
            .label-mobile {
                display: none;
            }
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-900">

    <div class="w-full">

        <!-- Seção 1 -->
        <section
            class="min-h-screen bg-cover bg-center relative flex flex-col justify-center items-center text-center px-4"
            style="background-image: url('{{ asset('images/img_secao1.png') }}');">
            <div class="mb-8 w-full flex justify-center items-center">
                <picture>
                    <source srcset="{{ asset('images/logo_secao1_mobile_xl.png') }}" media="(max-width: 767px)">
                    <img src="{{ asset('images/logo_secao1.png') }}" alt="Logo da campanha"
                        class="w-full max-w-[600px] sm:max-w-[700px] md:max-w-[800px] lg:max-w-[900px] xl:max-w-[1080px] 2xl:max-w-[1280px]">
                </picture>
            </div>

            <div class="absolute bottom-28 md:bottom-16 left-1/2 transform -translate-x-1/2">
                <button onclick="rolarParaFormulario()" class="font-bobby whitespace-nowrap bg-pink-500 text-white px-6 py-3 rounded-lg text-sm hover:bg-pink-600 transition">
                    SABER MAIS DA CAMPANHA
                </button>
            </div>
        </section>
        <!-- Seção 2 -->
        <section
            id="secao2"
            class="min-h-screen bg-cover bg-center relative text-center px-4 text-white"
            style="background-image: url('{{ asset('images/img_secão2.png') }}');">

            <!-- Parte de cima (40%) -->
            <div class="h-[40vh] flex items-center justify-center">
                <div class="max-w-xl px-4">
                    <h3 class="text-3xl md:text-4xl font-bold mb-4 font-bobby">Como funciona?</h3>
                    <p class="text-base md:text-lg text-justify font-childos">
                        A campanha Mamãe Premiada vai sortear mil reais por mês para os clientes que se cadastrarem e comprarem acima de R$ 70,00 em compras.
                        Todo mês esse sorteio pegará os números da sorte referente ao mês de realização.
                        Ou seja, comprando acima de R$ 70,00 no próximo mês, haverá uma nova oportunidade.
                    </p>
                </div>
            </div>

            <!-- Parte do meio (40%) -->
            <div class="h-[40vh] flex items-center justify-center">
                <div class="max-w-xl px-4">
                    <h3 class="text-3xl md:text-4xl font-bold mb-4 font-bobby">O que preciso fazer?</h3>
                    <p class="text-base md:text-lg text-justify font-childos">
                        Para participar é preciso estar cadastrado no programa de relacionamento da Farmácia Indiana – Cliente Premium – e fazer compras a partir de R$ 70,00.
                        Lembrando que para participar todo mês é preciso comprar pelo menos 1 vez por mês.
                    </p>
                </div>
            </div>

            <!-- Parte de baixo (20%) com botão -->
            <div class="h-[20vh] flex items-center justify-center relative">
                <button onclick="rolarParaFormulario2()" class="font-bobby whitespace-nowrap bg-pink-500 text-white px-6 py-3 rounded-xl text-dm md:text-xl hover:bg-pink-600 transition absolute bottom-28 md:bottom-16 left-1/2 transform -translate-x-1/2">
                    QUERO ME PARTICIPAR
                </button>
            </div>

        </section>
        <!-- Seção do formulário -->
        <section
            id="formulario"
            class="min-h-screen flex items-center justify-center bg-white p-2 md:p-6 pt-2 md:pt-6 bg-cover bg-center"
            style="background-image: url('{{ asset('images/logo_secao3.png') }}');">
            <!-- Metade esquerda da tela -->
            <div class="hidden lg:flex w-full lg:w-1/2 items-center justify-center bg-white/0">
                <div class="flex items-center justify-center h-full">
                    <img src="{{ asset('images/logo_secao1.png') }}" alt="Logo" class="w-full max-w-[80rem] h-auto">
                </div>
            </div>

            <!-- Metade direita da tela (formulário) -->
            <div class="w-full lg:w-1/2 flex items-center justify-center bg-white/0 relative">
                <div class="w-full max-w-xl bg-white/90 p-4 sm:p-6 md:p-8 rounded-xl">
                    <form method="POST" action="/enviar"  id="formularioCompleto" class="space-y-2">
                        @csrf
                        <div class="flex items-center justify-center h-full md:hidden">
                            <img src="{{ asset('images/logo_form_mobile.png') }}" alt="Logo" class="w-full max-w-[6rem] h-auto">
                        </div>
                        <!-- ETAPA 1 -->
                        <div id="etapa1">
                            <div class="mb-1">
                                <input name="cpf" id="cpf" placeholder="CPF" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
                                <p id="erro-cpf" class="text-red-600 text-sm hidden mt-1"></p>
                            </div>

                            <div class="mb-1">
                                <input name="nome" id="nome" placeholder="Nome completo" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
                                <p id="erro-nome" class="text-red-600 text-sm hidden mt-1"></p>
                            </div>

                            <div class="flex gap-4 mb-1">
                                <!-- Campo Data de Nascimento -->
                                <div class="flex-1">
                                    <label for="data_nascimento" class="block text-xs font-medium text-gray-700">Data de nascimento</label>
                                    <input name="data_nascimento" id="data_nascimento" type="date"
                                        class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 sm:text-sm" required>
                                    <p id="erro-data_nascimento" class="text-red-600 text-sm hidden mt-1"></p>
                                </div>
                                <!-- Campo Gênero -->
                                <div class="flex-1">
                                    <label for="genero" class="block text-xs font-medium text-gray-700">Gênero</label>
                                    <select name="genero" id="genero"
                                        class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 sm:text-sm" required>
                                        <option value="">Gênero</option>
                                        <option value="Feminino">Feminino</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Outro">Outro</option>
                                    </select>
                                    <p id="erro-genero" class="text-red-600 text-sm hidden mt-1"></p>
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-1 md:gap-4 mb-1">
                                <div class="flex-1 mb-1">
                                    <input name="cep" id="cep" placeholder="CEP" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
                                    <p id="erro-cep" class="text-red-600 text-sm hidden mt-1"></p>
                                </div>
                                <div class="flex-1 mb-1">
                                    <input name="cidade" id="cidade" placeholder="Cidade" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
                                    <p id="erro-cidade" class="text-red-600 text-sm hidden mt-1"></p>
                                </div>
                            </div>

                            <div class="mb-1">
                                <input name="rua" id="rua" placeholder="Endereço (Rua)" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
                                <p id="erro-rua" class="text-red-600 text-sm hidden mt-1"></p>
                            </div>

                            <div class="flex flex-col md:flex-row gap-1 md:gap-4 mb-1">
                                <div class="flex-1 mb-1">
                                    <input name="numero" id="numero" placeholder="Número" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
                                    <p id="erro-numero" class="text-red-600 text-sm hidden mt-1"></p>
                                </div>
                                <div class="flex-1">
                                    <input name="bairro" id="bairro" placeholder="Bairro" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
                                    <p id="erro-bairro" class="text-red-600 text-sm hidden mt-1"></p>
                                </div>
                                <div class="flex-1">
                                    <select name="uf" id="uf" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 mb-1" required>
                                        <option value="">UF</option>
                                        @foreach (['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO'] as $uf)
                                        <option value="{{ $uf }}">{{ $uf }}</option>
                                        @endforeach
                                    </select>
                                    <p id="erro-uf" class="text-red-600 text-sm hidden mt-1"></p>
                                </div>
                            </div>

                            <div class="flex flex-col md:flex-row gap-1 md:gap-4 mb-1">
                                <div class="flex-1 mb-1">
                                    <input name="email" id="email" placeholder="Email" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
                                    <p id="erro-email" class="text-red-600 text-sm hidden mt-1"></p>
                                </div>
                                <div class="flex-1 mb-1">
                                    <input name="telefone" id="telefone" placeholder="Telefone" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
                                    <p id="erro-telefone" class="text-red-600 text-sm hidden mt-1"></p>
                                </div>
                            </div>
                            <label class="flex items-center mt-4 mb-1">
                                <input type="checkbox" id="termos" required class="mr-2">
                                <span>Li e aceito os <a href="#" class="text-blue-600 underline">termos de uso</a></span>
                            </label>
                            <button type="button" onclick="validarEtapa1()" class="w-full bg-pink-600 text-white px-4 py-3 rounded hover:bg-pink-700 transition mt-4">
                                Próximo
                            </button>
                        </div>

                        <!-- ETAPA 2 -->
                        <div id="etapa2" class="hidden">

                            <!-- Seleção de perfil principal -->
                            <select name="perfil" id="perfil" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 mb-4" required onchange="mostrarOpcaoPerfil()">
                                <option value="">Qual seu perfil?</option>
                                <option value="Tentante">Tentante</option>
                                <option value="Gestante">Gestante</option>
                                <option value="Mamãe">Mamãe</option>
                            </select>

                            <!-- TENTANTE -->
                            <div id="opcaoTentante" class="hidden mb-4">
                                <label class="block mb-1">Escolha</label>
                                <select name="detalhe_tentante" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2">
                                    <option value="">Qual seu perfil?</option>
                                    <option value="primeiro">Tentante Primeiro Filho</option>
                                    <option value="outros">Tentante Segundo Filho ou Mais</option>
                                </select>
                            </div>

                            <!-- GESTANTE -->
                            <div id="opcaoGestante" class="hidden mb-4">
                                <label class="block mb-1">Escolha</label>
                                <select id="detalhe_gestante" name="detalhe_gestante" onchange="mostrarCamposGestante()" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 mb-4">
                                    <option value="">Qual seu perfil?</option>
                                    <option value="primeiro">Gestante Primeiro Filho</option>
                                    <option value="outros">Gestante Segundo Filho ou Mais</option>
                                </select>
                            </div>

                            <!-- Inputs adicionais, aparecem após escolha do tipo de gestante -->
                            <div id="detalhesGestante" class="hidden mt-4">

                                <!-- Mês da gestação -->
                                <label class="block mb-1">Qual mês da gestação?</label>
                                <select name="mes_gestacao" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 mb-2">
                                    <option value="">Selecione o mês</option>
                                    <option value="1">1º mês</option>
                                    <option value="2">2º mês</option>
                                    <option value="3">3º mês</option>
                                    <option value="4">4º mês</option>
                                    <option value="5">5º mês</option>
                                    <option value="6">6º mês</option>
                                    <option value="7">7º mês</option>
                                    <option value="8">8º mês</option>
                                    <option value="9">9º mês</option>
                                </select>

                                <!-- Sexo do bebê -->
                                <label class="block mb-1">Qual sexo do bebê?</label>
                                <select name="sexo_bebe" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 mb-2">
                                    <option value="">Selecione o sexo</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Feminino">Ainda Não Sei</option>
                                </select>

                                <!-- Nome do bebê -->
                                <label class="block mb-1">Já tem o nome do bebê?</label>
                                <input type="text" name="nome_bebe" placeholder="Digite o nome (se já souber)" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2">
                            </div>

                            <!-- MAMÃE -->
                            <div id="opcaoMamae" class="hidden mb-4">
                                <label class="block mb-1">Escolha</label>
                                <select id="detalhe_mamae" name="detalhe_mamae" onchange="mostrarCamposMamae()" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 mb-4">
                                    <option value="">Qual seu perfil?</option>
                                    <option value="primeiro">Já Sou Mamãe do Primeiro Filho</option>
                                    <option value="outros">Já Sou Mamãe do Segundo Filho ou Mais</option>
                                </select>
                            </div>

                            <!-- Inputs adicionais, aparecem após escolha do tipo de mamãe -->
                            <div id="detalhesMamae" class="hidden mt-4">

                                <!-- Faixa Etária -->
                                <label class="block mb-1">Idade do bebê/criança</label>
                                <select name="faixa_etaria_bebe" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 mb-2">
                                    <option value="">Selecione a faixa etária</option>
                                    <option value="1-3m">Recém-nascido (1 a 3 meses)</option>
                                    <option value="3-6m">Recém-nascido (3 a 6 meses)</option>
                                    <option value="6m-1a">Recém-nascido (6 meses a 1 ano)</option>
                                    <option value="1-3a">Bebê (1 a 3 anos)</option>
                                    <option value="3-5a">Criança (3 a 5 anos)</option>
                                </select>

                                <!-- Sexo do bebê -->
                                <label class="block mb-1">Qual sexo?</label>
                                <select name="sexo_bebe" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 mb-2">
                                    <option value="">Selecione o sexo</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Feminino">Não falar</option>
                                </select>

                                <!-- Nome -->
                                <label class="block mb-1">Nome da criança</label>
                                <input type="text" name="nome_bebe" placeholder="Digite o nome" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2">
                            </div>
                            <div class="flex gap-4 mt-4">
                                <label class="flex items-center mt-4 mb-1">
                                    <input type="checkbox" id="termos" required class="mr-2">
                                    <span>Li e aceito os <a href="#" class="text-blue-600 underline">termos de uso</a></span>
                                </label>
                            </div>
                            <div class="flex gap-4 mt-4">
                                <button type="button" onclick="mostrarEtapa1()" class="w-full bg-gray-300 text-gray-800 px-4 py-3 rounded hover:bg-gray-400 transition">
                                    Voltar
                                </button>
                            </div>
                            <div class="flex gap-4 mt-4">
                                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-3 rounded hover:bg-blue-700 transition">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
    </div>
    </section>
    </div>

    <!-- SCRIPTS -->
    <script>
        // Validação de CPF
        function validarCPF(cpf) {
            cpf = cpf.replace(/[^\d]+/g, '');
            if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) return false;
            let soma = 0;
            for (let i = 0; i < 9; i++) soma += parseInt(cpf.charAt(i)) * (10 - i);
            let resto = 11 - (soma % 11);
            if (resto >= 10) resto = 0;
            if (resto !== parseInt(cpf.charAt(9))) return false;
            soma = 0;
            for (let i = 0; i < 10; i++) soma += parseInt(cpf.charAt(i)) * (11 - i);
            resto = 11 - (soma % 11);
            if (resto >= 10) resto = 0;
            return resto === parseInt(cpf.charAt(10));
        }

        // Validação de nome completo
        function validarNomeCompleto(nome) {
            return nome.trim().split(' ').length >= 2;
        }

        // Validação de e-mail com regras mais específicas
        function validarEmail(email) {
            email = email.trim();

            // Regex explica:
            // ^            => início
            // [\w.%+-]{6,50} => usuário (mín. 6, máx. 50)
            // @             => arroba
            // [a-zA-Z0-9.-]{3,} => domínio (mín. 3 letras)
            // \.            => ponto
            // [a-zA-Z]{2,3} => extensão (2 a 3 letras)
            // $             => fim
            const regex = /^[\w.%+-]{6,50}@[a-zA-Z0-9.-]{3,}\.[a-zA-Z]{2,3}$/;
            return regex.test(email);
        }

        // Validação de telefone com DDD e verificação de dígitos repetidos após DDD
        function validarTelefone(telefone) {
            telefone = telefone.replace(/\D/g, '');

            // Tamanho permitido: 10 ou 11 dígitos
            if (telefone.length < 10 || telefone.length > 11) return false;


            // Extra: não permitir que todos os dígitos depois do DDD sejam iguais
            const ddd = telefone.slice(0, 2);
            const numero = telefone.slice(2);

            if (/^(\d)\1+$/.test(numero)) return false;

            return true;
        }

        // Máscara para telefone (ativa enquanto o usuário digita)
        document.getElementById('telefone').addEventListener('input', function() {
            let telefone = this.value.replace(/\D/g, '');
            if (telefone.length > 11) telefone = telefone.slice(0, 11);

            if (telefone.length <= 10) {
                telefone = telefone.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
            } else {
                telefone = telefone.replace(/(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
            }

            this.value = telefone.trim();
        });

        // Validação de CEP (formato e busca via API)
        function validarCEP(cep) {
            return /^\d{5}-?\d{3}$/.test(cep);
        }

        // Exibe erro no campo informado
        function mostrarErro(id, mensagem) {
            const campo = document.getElementById(id);
            const erro = document.getElementById('erro-' + id);

            if (campo) campo.classList.add('border-red-500');
            if (erro) {
                erro.textContent = mensagem;
                erro.classList.remove('hidden');
            }
        }

        // Limpa todos os erros visuais e mensagens
        function limparErros() {
            document.querySelectorAll('input, select').forEach(el => el.classList.remove('border-red-500'));
            document.querySelectorAll('p[id^="erro-"]').forEach(p => {
                p.textContent = '';
                p.classList.add('hidden');
            });
        }

        // Validação da Etapa 1 (formulário)
        function validarEtapa1() {
            limparErros();
            let valido = true;

            const campos = [{
                    id: 'cpf',
                    regra: v => v.trim() && validarCPF(v),
                    msg: 'CPF inválido.'
                },
                {
                    id: 'nome',
                    regra: v => v.trim() && validarNomeCompleto(v),
                    msg: 'Digite seu nome completo.'
                },
                {
                    id: 'data_nascimento',
                    regra: v => v.trim(),
                    msg: 'Informe sua data de nascimento.'
                },
                {
                    id: 'genero',
                    regra: v => v.trim(),
                    msg: 'Selecione seu gênero.'
                },
                {
                    id: 'cep',
                    regra: v => validarCEP(v),
                    msg: 'CEP inválido.'
                },
                {
                    id: 'cidade',
                    regra: v => v.trim(),
                    msg: 'Informe a cidade.'
                },
                {
                    id: 'rua',
                    regra: v => v.trim(),
                    msg: 'Informe a rua.'
                },
                {
                    id: 'numero',
                    regra: v => v.trim(),
                    msg: 'Informe o número.'
                },
                {
                    id: 'bairro',
                    regra: v => v.trim(),
                    msg: 'Informe o bairro.'
                },
                {
                    id: 'uf',
                    regra: v => v.trim(),
                    msg: 'Selecione o estado.'
                },
                {
                    id: 'email',
                    regra: v => validarEmail(v),
                    msg: 'E-mail inválido.'
                },
                {
                    id: 'telefone',
                    regra: v => validarTelefone(v),
                    msg: 'Telefone inválido.'
                }
            ];

            campos.forEach(campo => {
                const valor = document.getElementById(campo.id)?.value || '';
                if (!campo.regra(valor)) {
                    mostrarErro(campo.id, campo.msg);
                    valido = false;
                }
            });

            const termos = document.getElementById('termos');
            if (termos && !termos.checked) {
                mostrarErro('termos', 'Você deve aceitar os termos de uso para continuar.');
                valido = false;
            }

            if (valido) {
                mostrarEtapa2();
            }
        }

        // Máscara dinâmica para CPF
        document.getElementById('cpf').addEventListener('input', function() {
            let value = this.value.replace(/\D/g, '');
            if (value.length > 11) value = value.slice(0, 11);
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            this.value = value;
        });

        // Busca de endereço via CEP
        document.getElementById('cep').addEventListener('blur', function() {
            const cep = this.value.replace(/\D/g, '');

            if (!validarCEP(cep)) {
                mostrarErro('cep', 'CEP inválido.');
                return;
            }

            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(data => {
                    if (!data.erro) {
                        document.getElementById('rua').value = data.logradouro || '';
                        document.getElementById('bairro').value = data.bairro || '';
                        document.getElementById('cidade').value = data.localidade || '';
                        document.getElementById('uf').value = data.uf || '';
                    } else {
                        mostrarErro('cep', 'CEP não encontrado.');
                    }
                })
                .catch(() => mostrarErro('cep', 'Erro ao buscar CEP.'));
        });

        // Limpa os campos se o CEP for apagado
        document.getElementById('cep').addEventListener('input', function() {
            const cep = this.value.replace(/\D/g, '');
            if (cep.length < 8) {
                document.getElementById('rua').value = '';
                document.getElementById('bairro').value = '';
                document.getElementById('cidade').value = '';
                document.getElementById('uf').value = '';
            }
        });

        // Troca de etapa
        function mostrarEtapa2() {
            document.getElementById('etapa1').classList.add('hidden');
            document.getElementById('etapa2').classList.remove('hidden');
        }

        function mostrarEtapa1() {
            document.getElementById('etapa2').classList.add('hidden');
            document.getElementById('etapa1').classList.remove('hidden');
        }

        function mostrarOpcaoPerfil() {
            const valor = document.getElementById('perfil').value;

            // Esconde todos os blocos principais
            document.getElementById('opcaoTentante').classList.add('hidden');
            document.getElementById('opcaoGestante').classList.add('hidden');
            document.getElementById('opcaoMamae').classList.add('hidden');

            // Esconde todos os detalhes adicionais (para resetar ao trocar)
            document.getElementById('detalhesGestante').classList.add('hidden');
            document.getElementById('detalhesMamae').classList.add('hidden');

            // Limpa selects
            const selectGestante = document.getElementById('detalhe_gestante');
            const selectMamae = document.getElementById('detalhe_mamae');
            if (selectGestante) selectGestante.value = '';
            if (selectMamae) selectMamae.value = '';

            // Mostra o bloco correspondente
            if (valor === 'Tentante') {
                document.getElementById('opcaoTentante').classList.remove('hidden');
            } else if (valor === 'Gestante') {
                document.getElementById('opcaoGestante').classList.remove('hidden');
            } else if (valor === 'Mamãe') {
                document.getElementById('opcaoMamae').classList.remove('hidden');
            }
        }

        // Mostra inputs adicionais para gestante quando uma opção for escolhida
        function mostrarCamposGestante() {
            const select = document.getElementById('detalhe_gestante');
            const valor = select.value;

            if (valor !== '') {
                document.getElementById('detalhesGestante').classList.remove('hidden');
            } else {
                document.getElementById('detalhesGestante').classList.add('hidden');
            }
        }

        function mostrarCamposMamae() {
            const valor = document.getElementById('detalhe_mamae').value;
            if (valor !== '') {
                document.getElementById('detalhesMamae').classList.remove('hidden');
            } else {
                document.getElementById('detalhesMamae').classList.add('hidden');
            }
        }

        // Rolagem suave até o formulário
        function rolarParaFormulario() {
            document.getElementById('secao2').scrollIntoView({
                behavior: 'smooth'
            });
        }

        function rolarParaFormulario2() {
            document.getElementById('formulario').scrollIntoView({
                behavior: 'smooth'
            });
        }

        // Validação instantânea do E-MAIL
        const inputEmail = document.getElementById('email');
        inputEmail.addEventListener('input', () => {
            const email = inputEmail.value.trim();
            if (!validarEmail(email)) {
                mostrarErro('email', 'E-mail inválido.');
            } else {
                limparErro('email');
            }
        });

        // Validação instantânea do TELEFONE
        const inputTelefone = document.getElementById('telefone');
        inputTelefone.addEventListener('input', () => {
            const telefone = inputTelefone.value.trim();
            if (!validarTelefone(telefone)) {
                mostrarErro('telefone', 'Telefone inválido.');
            } else {
                limparErro('telefone');
            }
        });

        // Função auxiliar para limpar um erro individual
        function limparErro(id) {
            const campo = document.getElementById(id);
            const erro = document.getElementById('erro-' + id);
            if (campo) campo.classList.remove('border-red-500');
            if (erro) {
                erro.textContent = '';
                erro.classList.add('hidden');
            }
        }
    </script>
</body>

</html>