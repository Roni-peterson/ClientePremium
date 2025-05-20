<form method="POST" action="{{ route('dermocosmeticos.store') }}" class="space-y-4">
    @csrf

    <!-- Nome -->
    <div>
        <label for="nome" class="block text-sm font-medium text-gray-700">Nome completo</label>
        <input type="text" id="nome" name="nome" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
    </div>

    <!-- CPF -->
    <div>
        <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
        <input type="text" id="cpf" name="cpf" required maxlength="14"
               placeholder="000.000.000-00"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
    </div>

    <!-- Email -->
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
        <input type="email" id="email" name="email" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
    </div>

    <!-- Telefone -->
    <div>
        <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone</label>
        <input type="tel" id="telefone" name="telefone" required
               placeholder="(00) 00000-0000"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
    </div>

    <!-- Data de Nascimento -->
    <div>
        <label for="data_nascimento" class="block text-sm font-medium text-gray-700">Data de nascimento</label>
        <input type="date" id="data_nascimento" name="data_nascimento" required
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
    </div>

    <!-- Gênero -->
    <div>
        <label for="genero" class="block text-sm font-medium text-gray-700">Gênero</label>
        <select id="genero" name="genero" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <option value="">Selecione</option>
            <option value="Feminino">Feminino</option>
            <option value="Masculino">Masculino</option>
            <option value="Outro">Outro</option>
            <option value="Prefiro não dizer">Prefiro não dizer</option>
        </select>
    </div>

    <!-- Tipo de Pele -->
    <div>
        <label for="tipo_pele" class="block text-sm font-medium text-gray-700">Tipo de pele</label>
        <select id="tipo_pele" name="tipo_pele" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <option value="">Selecione</option>
            <option value="Oleosa">Oleosa</option>
            <option value="Mista">Mista</option>
            <option value="Seca">Seca</option>
            <option value="Normal">Normal</option>
            <option value="Sensível">Sensível</option>
            <option value="Não sei">Não sei</option>
        </select>
    </div>

    <!-- Interesse -->
    <div>
        <label for="interesse" class="block text-sm font-medium text-gray-700">Interesse</label>
        <select id="interesse" name="interesse" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <option value="">Selecione</option>
            <option value="Anti-idade">Anti-idade</option>
            <option value="Hidratação">Hidratação</option>
            <option value="Controle de oleosidade">Controle de oleosidade</option>
            <option value="Clareamento">Clareamento</option>
            <option value="Acne">Acne</option>
            <option value="Outro">Outro</option>
        </select>
    </div>

    <!-- Usa protetor solar? -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Você usa protetor solar diariamente?</label>
        <div class="mt-2 space-y-1">
            <label class="flex items-center">
                <input type="radio" name="protetor_solar" value="Sim" required
                       class="h-4 w-4 text-indigo-600 border-gray-300" />
                <span class="ml-2 text-sm text-gray-700">Sim</span>
            </label>
            <label class="flex items-center">
                <input type="radio" name="protetor_solar" value="Não"
                       class="h-4 w-4 text-indigo-600 border-gray-300" />
                <span class="ml-2 text-sm text-gray-700">Não</span>
            </label>
        </div>
    </div>

    <!-- Faixa Etária -->
    <div>
        <label for="faixa_etaria" class="block text-sm font-medium text-gray-700">Faixa etária</label>
        <select id="faixa_etaria" name="faixa_etaria" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            <option value="">Selecione</option>
            <option value="Até 18 anos">Até 18 anos</option>
            <option value="19 a 25 anos">19 a 25 anos</option>
            <option value="26 a 35 anos">26 a 35 anos</option>
            <option value="36 a 45 anos">36 a 45 anos</option>
            <option value="46 a 55 anos">46 a 55 anos</option>
            <option value="56 anos ou mais">56 anos ou mais</option>
        </select>
    </div>

    <!-- Botão Enviar -->
    <div class="pt-4">
        <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
            Enviar
        </button>
    </div>
</form>