<!-- layouts/form.blade.php -->
<div class="w-full max-w-md">
  <h2 class="text-2xl font-semibold mb-6 text-gray-800">Acesse sua conta</h2>
  <form action="{{ route('login') }}" method="POST" class="space-y-4">
    @csrf
    <div>
      <label for="cpf" class="block text-sm text-gray-600">CPF</label>
      <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>
    <div>
      <label for="senha" class="block text-sm text-gray-600">Senha</label>
      <input type="password" id="senha" name="senha" placeholder="Digite sua senha"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" />
    </div>
    <div>
      <button type="submit"
        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition">Entrar</button>
    </div>
    <p class="text-sm text-gray-500 text-center mt-4">Esqueceu a senha? <a href="#" class="text-blue-600 hover:underline">Clique aqui</a></p>
  </form>
</div>
