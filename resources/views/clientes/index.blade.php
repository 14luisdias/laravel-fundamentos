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
            <a href="/" class="text-2xl font-semibold">TreinaWeb</a>

            <ul class="font-medium flex">
                <li class="px-4"> <a href="/clientes" class="font-semibold">Lista de Clientes</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold text-center my-4">
            Lista de Clientes
        </h1>
        <div class="flex justify-end my-3">
            <a href="/clientes/create" class="bg-blue-500 border rounded-md p-1 px-3 text-white">Novo Cliente</a>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nome
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Endereço
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descrição
                        </th>
                    </tr>
                </thead>

                @foreach ($clientes as $cliente)
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $cliente->nome }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $cliente->endereco }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $cliente->descricao }}
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        
    </div>

</body>

</html>