<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <nav class="bg-gray-300 p-4">
        <div class="container mx-auto flex items-center justify-between ">
            <a href="" class="text-2xl font-semibold">TreinaWeb</a>

            <ul class="font-medium flex">
                <li class="px-4">Cadastro de Clientes</li>
                <li class="px-4">Cadastro de Clientes</li>
                <li class="px-4">Cadastro de Clientes</li>
            </ul>
        </div>
    </nav>
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold underline">
            Hello world!
        </h1>
        @foreach ($clientes as $cliente)
            <strong> Nome: </strong> {{ $cliente->nome }} |
            <strong> Endereço: </strong> {{ $cliente->endereco }} |
            <strong> Descrição: </strong> {{ $cliente->descricao }}
            <br>
        @endforeach
    </div>

</body>

</html>