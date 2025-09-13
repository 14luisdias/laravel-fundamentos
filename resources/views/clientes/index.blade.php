

@foreach ($clientes as $cliente)
    Nome: {{ $cliente->nome }} | Endereço: {{ $cliente->endereco }} | Descrição: {{ $cliente->descricao }} 
    <br>
@endforeach