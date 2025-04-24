<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        $ultimaInteracao = session('ultima_interacao');
        $agora = now();

        if ($ultimaInteracao && $agora->diffInSeconds($ultimaInteracao) > 30) {
            // Passaram mais de 30 segundos → limpa e volta pro CPF
            session()->forget(['etapa', 'cliente', 'cliente_id', 'metodo', 'codigo_enviado']);
        }

        // Atualiza o timestamp de última interação
        session(['ultima_interacao' => $agora]);

        return view('login');
    }
    public function verificarCPF(Request $request)
    {
        $cpf = preg_replace('/[^0-9]/', '', $request->cpf);
        $cliente = Cliente::where('cpf', $cpf)->first();

        session(['cpf_informado' => $cpf]);

        if ($cliente) {
            session(['cliente_id' => $cliente->id, 'cliente' => $cliente]);

            // Verifica se o cliente já possui senha cadastrada
            if (!empty($cliente->senha)) {
                session(['etapa' => 'login-final']); // Vai direto pro login final
            } else {
                session(['etapa' => 'escolher_metodo']); // Não tem senha → escolhe método de envio de código
            }
        } else {
            session(['etapa' => 'cadastro']); // CPF não cadastrado → vai pro cadastro
        }

        return redirect()->route('login');
    }

    public function escolherMetodoEnvio(Request $request)
    {
        $request->validate([
            'metodo' => 'required|in:telefone,email'
        ]);

        $cliente = Cliente::find(session('cliente_id'));

        if (!$cliente) {
            return redirect()->route('login')->with('mensagem', 'Cliente não encontrado.');
        }

        session([
            'metodo' => $request->metodo,
            'cliente' => $cliente,
            'etapa' => 'confirmacao'
        ]);

        return redirect()->route('login');
    }

    public function confirmarEscolha(Request $request)
    {
        $metodo = session('metodo');
        $cliente = session('cliente');

        if ($metodo === 'telefone') {
            $input = $request->confirmacao;
            $telefoneFinal = substr($cliente->telefone, -4);

            if ($input !== $telefoneFinal) {
                return redirect()->back()->with('mensagem', 'Os dígitos não conferem.');
            }
        } elseif ($metodo === 'email') {
            if ($request->confirmacao !== $cliente->email) {
                return redirect()->back()->with('mensagem', 'Email não confere.');
            }
        }

        // Simulando envio de código (ideal seria gerar e enviar aqui)
        session(['codigo_enviado' => '1234', 'etapa' => 'codigo']);

        return redirect()->route('login');
    }

    public function enviarCodigo(Request $request)
    {
        if ($request->codigo === session('codigo_enviado')) {
            session(['etapa' => 'senha']);
            return redirect()->route('login');
        }

        return redirect()->back()->with('mensagem', 'Código incorreto.');
    }

    public function criarSenha(Request $request)
    {
        $request->validate([
            'senha' => 'required|confirmed|min:6'
        ]);

        $cliente = Cliente::find(session('cliente_id'));
        $cliente->senha = Hash::make($request->senha);
        $cliente->save();

        session(['etapa' => 'login-final']);
        return redirect()->route('login');
    }

    public function loginFinal(Request $request)
    {
        $request->validate([
            'cpf' => 'required',
            'senha' => 'required'
        ]);

        $cpf = preg_replace('/[^0-9]/', '', $request->cpf);
        $cliente = Cliente::where('cpf', $cpf)->first();

        if (!$cliente || !Hash::check($request->senha, $cliente->senha)) {
            return redirect()->back()->withErrors(['cpf' => 'CPF ou senha inválidos']);
        }

        auth()->login($cliente);
        session()->forget(['etapa', 'cliente', 'metodo', 'codigo_enviado']);
        return redirect()->route('campanha.index'); // ou qualquer outra rota
    }

    public function iniciarRecuperacao(Request $request)
    {
        $cpf = preg_replace('/[^0-9]/', '', $request->cpf);
        $cliente = Cliente::where('cpf', $cpf)->first();

        if ($cliente) {
            session([
                'cliente_id' => $cliente->id,
                'cliente' => $cliente,
                'cpf_informado' => $cpf,
                'etapa' => 'escolher_metodo'
            ]);
        } else {
            session(['etapa' => 'cadastro', 'cpf_informado' => $cpf]);
        }

        return redirect()->route('login');
    }

    public function cadastrarCliente(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'telefone' => 'required',
            'data_nascimento' => 'required|date',
            'genero' => 'required',
        ]);

        $cliente = Cliente::create([
            'cpf' => $request->cpf,
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'data_nascimento' => $request->data_nascimento,
            'genero' => $request->genero,
        ]);

        session([
            'cliente_id' => $cliente->id,
            'cliente' => $cliente,
            'etapa' => 'escolher_metodo'
        ]);

        return redirect()->route('login');
    }
}
