<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LoginController;

// Redirecionar a rota raiz para a tela de login
Route::redirect('/', '/login');

// Rota da campanha (ex: formulário para clientes)
Route::get('/mamae-premiada', [ClienteController::class, 'index'])->name('campanha.index');

// Submissão do formulário da campanha
Route::post('/enviar', [ClienteController::class, 'store'])->name('campanha.enviar');

// Painel de administração da campanha
Route::get('/painel-mamaepremiada', [ClienteController::class, 'painel'])->name('campanha.painel');

// Exportar dados dos clientes (CSV)
Route::get('/exportar-clientes', [ClienteController::class, 'exportarCsv'])->name('clientes.exportar');

// Detalhes de um cliente
Route::get('/cliente/{id}', [ClienteController::class, 'mostrar'])->name('cliente.mostrar');

// Tela de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/verificar-cpf', [LoginController::class, 'verificarCPF'])->name('verificar.cpf');
Route::post('/escolher-metodo', [LoginController::class, 'escolherMetodoEnvio'])->name('escolher.metodo');
Route::post('/confirmar-codigo', [LoginController::class, 'confirmarEscolha'])->name('confirmar.codigo');
Route::post('/enviar-codigo', [LoginController::class, 'enviarCodigo'])->name('enviar.codigo');
Route::post('/criar-senha', [LoginController::class, 'criarSenha'])->name('criar.senha');
Route::post('/login-final', [LoginController::class, 'loginFinal'])->name('login.final');
Route::post('/iniciar-recuperacao', [LoginController::class, 'iniciarRecuperacao'])->name('iniciar.recuperacao');
Route::post('/cadastrar-cliente', [LoginController::class, 'cadastrarCliente'])->name('cadastrar.cliente');