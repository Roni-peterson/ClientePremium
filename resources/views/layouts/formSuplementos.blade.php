<!-- layouts/formDLI.blade.php -->

<div class="w-full max-w-md">
    <form method="POST" action="{{ route('formulario.enviar') }}" id="formularioCompleto" class="space-y-2">
        @csrf
        <!-- CPF -->
        <div class="mb-1">
            <input name="cpf" id="cpf" placeholder="CPF" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
        </div>

        <!-- Nome completo -->
        <div class="mb-1">
            <input name="nome" id="nome" placeholder="Nome completo" class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
        </div>

        <!-- Data de nascimento e Gênero -->
        <div class="flex gap-4 mb-1">
            <div class="flex-1">
                <label for="data_nascimento" class="block text-xs font-medium text-gray-700">Data de nascimento</label>
                <input name="data_nascimento" id="data_nascimento" type="date"
                    class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 sm:text-sm"
                    max="2010-01-01" required>
            </div>
            <div class="flex-1">
                <label for="genero" class="block text-xs font-medium text-gray-700">Gênero</label>
                <select name="genero" id="genero"
                    class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 sm:text-sm" required>
                    <option value="">Gênero</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Outros">Outros</option>
                    <option value="NaoInformar">Não Informar</option>
                </select>
            </div>
        </div>

        <!-- CEP e Cidade -->
        <div class="flex flex-col md:flex-row gap-1 md:gap-4 mb-1">
            <div class="flex-1">
                <input name="cep" id="cep" placeholder="00000-000" maxlength="9"
                    class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
            </div>
            <div class="flex-1">
                <input name="cidade" id="cidade" placeholder="Cidade"
                    class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
            </div>
        </div>

        <!-- Rua -->
        <div class="mb-1">
            <input name="rua" id="rua" placeholder="Endereço (Rua)"
                class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
        </div>

        <!-- Número, Bairro, UF -->
        <div class="flex flex-col md:flex-row gap-1 md:gap-4 mb-1">
            <div class="flex-1">
                <input name="numero" id="numero" placeholder="Número"
                    class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
            </div>
            <div class="flex-1">
                <input name="bairro" id="bairro" placeholder="Bairro"
                    class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
            </div>
            <div class="flex-1">
                <select name="uf" id="uf"
                    class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 mb-1" required>
                    <option value="">UF</option>
                    @foreach (['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO'] as $uf)
                    <option value="{{ $uf }}">{{ $uf }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Email e Telefone -->
        <div class="flex flex-col md:flex-row gap-1 md:gap-4 mb-1">
            <div class="flex-1">
                <input name="email" id="email" placeholder="Email"
                    class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
            </div>
            <div class="flex-1">
                <input name="telefone" id="telefone" placeholder="Telefone"
                    class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2" required>
            </div>
        </div>

        <!-- Classificação de treino, tempo de academia e profissional -->
        <div class="flex flex-col md:flex-row gap-4 mb-2">
            <!-- Nível de Treinamento -->
            <div class="flex-1">
                <label for="classificacao_treino" class="block text-sm font-medium text-gray-700 mb-1">Nível de Treinamento</label>
                <select name="classificacao_treino" id="classificacao_treino"
                    class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 sm:text-sm" required>
                    <option value="">Selecione</option>
                    <option value="Iniciante">Iniciante</option>
                    <option value="Intermediário">Intermediário</option>
                    <option value="Avançado">Avançado</option>
                    <option value="Treino as vezes">Treino as vezes</option>
                    <option value="Quero começar">Quero começar</option>
                </select>
            </div>

            <!-- Tempo de Academia -->
            <div class="flex-1">
                <label for="tempo_academia" class="block text-sm font-medium text-gray-700 mb-1">Tempo de Academia</label>
                <select name="tempo_academia" id="tempo_academia"
                    class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 sm:text-sm" required>
                    <option value="">Selecione</option>
                    <option value="Menos de 1 mês">Menos de 1 mês</option>
                    <option value="1 a 3 meses">1 a 3 meses</option>
                    <option value="3 a 6 meses">3 a 6 meses</option>
                    <option value="6 a 12 meses">6 a 12 meses</option>
                    <option value="1 a 3 anos">1 a 3 anos</option>
                    <option value="Mais de 3 anos">Mais de 3 anos</option>
                </select>
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-4 mb-2">
            <!-- Classificação Profissional -->
            <div class="flex-1">
                <label for="classificacao_profissional" class="block text-sm font-medium text-gray-700 mb-1">Classificação Profissional</label>
                <select name="classificacao_profissional" id="classificacao_profissional"
                    class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 sm:text-sm" required>
                    <option value="">Selecione</option>
                    <option value="Personal de Musculação">Personal de Musculação</option>
                    <option value="Personal de Crossfit">Personal de Crossfit</option>
                    <option value="Nutricionista">Nutricionista</option>
                    <option value="Educador Físico">Educador Físico</option>
                    <option value="Não sou Profissional">Não sou Profissional</option>
                    <option value="Outros">Outros</option>
                </select>
            </div>
            <!-- Modalidades -->
            <div class="flex-1">
                <label for="modalidade" class="block text-sm font-medium text-gray-700 mb-1">Modalidades</label>
                <select name="modalidade" id="modalidade"
                    class="w-full border border-gray-300 rounded px-3 py-3 sm:py-2 sm:text-sm" required>
                    <option value="">Selecione</option>
                    <option value="Musculação">Musculação</option>
                    <option value="Crossfit">Crossfit</option>
                    <option value="Funcional">Funcional</option>
                    <option value="Calistenia">Calistenia</option>
                    <option value="Pilates">Pilates</option>
                    <option value="Atletismo">Atletismo</option>
                    <option value="Ciclismo">Ciclismo</option>
                    <option value="Natação">Natação</option>
                    <option value="Outros">Outros</option>
                </select>
            </div>
        </div> 
        <!-- Botão -->
        <div>
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition">
                Enviar
            </button>
        </div>
    </form>
</div>