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
            Atualização de Clientes
        </h1>
        <!--  apartir daqui foi inserido o htl form do tailwinds  -->
        <form method="post" action="/clientes" class="max-w-6xl mx-auto">
            @csrf
            <input type="hidden" id="flag" name= "id" value='{{ $clientes->id }}'/>
            <div class="mb-5">
                <label for=nome class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do Cliente</label>
                <input type="text" id="nome" name= "nome"
                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                    required value="{{ $clientes->nome }}"/>
            </div>
            <div class="mb-5">
                <label for="endereco" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereço do Cliente</label>
                <input type="text" id="endereco" name= "endereco"
                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                    required value="{{ $clientes->endereco }}"/>
            </div>
            <div class="mb-5">
                <label for="descricao" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição do Cliente</label>
                <input type="text" id="descricao" name= "descricao"
                    class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-xs-light"
                    required value="{{ $clientes->descricao }}"/>
            </div>
          
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Atualizar
                Cliente</button>
        </form>


    </div>

</body>

</html>
