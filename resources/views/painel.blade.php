<!DOCTYPE html>
<html>
<head>
    <title>Painel de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <meta http-equiv="refresh" content="5">
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-2xl font-bold mb-4">Lista de Clientes (Atualização em tempo real)</h1>
    <table class="min-w-full bg-white shadow-md rounded">
        <thead>
            <tr>
                <th class="py-2 px-4 border">Nome</th>
                <th class="py-2 px-4 border">Email</th>
                <th class="py-2 px-4 border">Telefone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td class="py-2 px-4 border">{{ $cliente->nome }}</td>
                    <td class="py-2 px-4 border">{{ $cliente->email }}</td>
                    <td class="py-2 px-4 border">{{ $cliente->telefone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
