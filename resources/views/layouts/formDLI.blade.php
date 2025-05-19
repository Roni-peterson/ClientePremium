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

        <!-- Categoria de Ofertas -->
        <div class="mb-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">QUAIS OFERTAS QUERO RECEBER</label>
            <div class="flex flex-wrap gap-2">
                @php
                $categorias = ['Alimentos', 'Aparelhos Eletronicos', 'Cuidados com cabelo', 'Cuidados com o corpo','Dermocosmeticos', 'Infantil','Geral', 'Medicamentos'];
                @endphp

                @foreach($categorias as $categoria)
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="categorias[]" value="{{ $categoria }}" class="text-blue-600">
                    <span class="text-sm text-gray-700">{{ $categoria }}</span>
                </label>
                @endforeach
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
<script>
    document.querySelector('form').addEventListener('submit', function (e) {
        const checkboxes = document.querySelectorAll('input[name="categorias[]"]');
        const isChecked = Array.from(checkboxes).some(cb => cb.checked);

        if (!isChecked) {
            e.preventDefault();
            alert('Selecione pelo menos uma categoria de oferta.');
        }
    });
</script>