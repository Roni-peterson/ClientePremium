<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DLIController extends Controller
{
    // Redirecionamento de acordo com o dispositivo
    public function redirectByDevice(Request $request)
    {
        // Detecta o tipo de dispositivo (mobile ou desktop)
        $userAgent = $request->header('User-Agent');
        $isMobile = preg_match('/Mobile|Android|iPhone|iPad|iPod/i', $userAgent);

        if ($isMobile) {
            return redirect()->route('dli.mobile');
        } else {
            return redirect()->route('dli.desktop');
        }
    }

    // Exibe a versão Desktop
    public function indexDesktop()
    {
        return view('layouts.dli_desktop');
    }

    // Exibe a versão Mobile
    public function indexMobile()
    {
        return view('layouts.dli_mobile');
    }

    // Processa o envio do formulário
    public function store(Request $request)
    {
        // Validação básica
        $request->validate([
            'cpf' => 'required|string|max:14',
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'genero' => 'required|string',
            'cep' => 'required|string',
            'cidade' => 'required|string',
            'rua' => 'required|string',
            'numero' => 'required|string',
            'bairro' => 'required|string',
            'uf' => 'required|string|max:2',
            'email' => 'required|email',
            'telefone' => 'required|string',
            'categoria' => 'nullable|array',
        ]);

        // Aqui você pode salvar os dados, por exemplo:
        // Cliente::create($request->all());

        return back()->with('success', 'Formulário enviado com sucesso!');
    }
}
