<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function index()
    {
        return view('campanha');
    }

    public function store(Request $request)
    {
        $cliente = Cliente::create($request->only(['nome', 'email', 'telefone']));

        // envia para segundo banco (exemplo simples)
        DB::connection('destino')->table('clientes')->insert([
            'nome' => $cliente->nome,
            'email' => $cliente->email,
            'telefone' => $cliente->telefone,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/painel');
    }

    public function painel()
    {
        $clientes = Cliente::latest()->get();
        return view('painel', compact('clientes'));
    }
}
