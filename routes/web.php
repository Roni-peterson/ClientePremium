<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DLIController;
use App\Http\Controllers\SuplementosController;
use App\Http\Controllers\DermocosmeticosController;

// =============================
// 🔁 Redirecionamentos
// =============================
Route::redirect('/', '/login');

// =============================
// 🔐 Autenticação (Login)
// =============================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/verificar-cpf', [LoginController::class, 'verificarCPF'])->name('verificar.cpf');
Route::post('/escolher-metodo', [LoginController::class, 'escolherMetodoEnvio'])->name('escolher.metodo');
Route::post('/enviar-codigo', [LoginController::class, 'enviarCodigo'])->name('enviar.codigo');
Route::post('/confirmar-codigo', [LoginController::class, 'confirmarEscolha'])->name('confirmar.codigo');
Route::post('/criar-senha', [LoginController::class, 'criarSenha'])->name('criar.senha');
Route::post('/login-final', [LoginController::class, 'loginFinal'])->name('login.final');
Route::post('/iniciar-recuperacao', [LoginController::class, 'iniciarRecuperacao'])->name('iniciar.recuperacao');
Route::post('/cadastrar-cliente', [LoginController::class, 'cadastrarCliente'])->name('cadastrar.cliente');

// =============================
// 🎯 Campanha Mamãe Premiada
// =============================
Route::get('/mamae-premiada', [ClienteController::class, 'index'])->name('campanha.index');
Route::post('/enviar', [ClienteController::class, 'store'])->name('campanha.enviar');
Route::get('/painel-mamaepremiada', [ClienteController::class, 'painel'])->name('campanha.painel');
Route::get('/exportar-clientes', [ClienteController::class, 'exportarCsv'])->name('clientes.exportar');
Route::get('/cliente/{id}', [ClienteController::class, 'mostrar'])->name('cliente.mostrar');

// =============================
// 💻/📱 Campanha DLI
// =============================
Route::get('/dli', [DLIController::class, 'redirectByDevice'])->name('dli');
Route::get('/dli-desktop', [DLIController::class, 'indexDesktop'])->name('dli.desktop');
Route::get('/dli-mobile', [DLIController::class, 'indexMobile'])->name('dli.mobile');
Route::post('/enviar', [DLIController::class, 'store'])->name('formulario.enviar');

// =============================
// 💪 Campanha Suplementos
// =============================
Route::get('/suplementos', [SuplementosController::class, 'redirectByDevice'])->name('suplementos');
Route::get('/suplementos/desktop', [SuplementosController::class, 'indexDesktop'])->name('suplementos.desktop');
Route::get('/suplementos/mobile', [SuplementosController::class, 'indexMobile'])->name('suplementos.mobile');
Route::post('/suplementos', [SuplementosController::class, 'store'])->name('suplementos.store');

// =============================
// 💅 Campanha Dermocosméticos
// =============================

Route::get('/dermocosmeticos', [DermocosmeticosController::class, 'redirectByDevice'])->name('dermocosmeticos');
Route::get('/dermocosmeticos/desktop', [DermocosmeticosController::class, 'indexDesktop'])->name('dermocosmeticos.desktop');
Route::get('/dermocosmeticos/mobile', [DermocosmeticosController::class, 'indexMobile'])->name('dermocosmeticos.mobile');
Route::post('/dermocosmeticos', [DermocosmeticosController::class, 'store'])->name('dermocosmeticos.store');
