<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DermocosmeticosController extends Controller
{
    /**
     * Redireciona com base no tipo de dispositivo.
     */
    public function redirectByDevice()
    {
        return request()->userAgent() && preg_match('/mobile/i', request()->userAgent())
            ? redirect()->route('dermocosmeticos.mobile')
            : redirect()->route('dermocosmeticos.desktop');
    }

    /**
     * Exibe a view para desktop.
     */
    public function indexDesktop()
    {
        return view('layouts.dermocosmeticos_desktop');
    }

    /**
     * Exibe a view para mobile.
     */
    public function indexMobile()
    {
        return view('formDermocosmeticos');
    }

    /**
     * Armazena os dados enviados pelo formulário.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefone' => 'nullable|string|max:20',
            'tipo_pele' => 'required|string',
            'interesse' => 'required|array',
            'protetor_solar' => 'required|string',
            'genero' => 'required|string',
            'faixa_etaria' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Aqui você pode salvar no banco ou outro destino
        // Exemplo (caso esteja usando uma Model ClienteDermocosmetico):
        // ClienteDermocosmetico::create($request->all());

        return redirect()->back()->with('success', 'Dados enviados com sucesso!');
    }
}
