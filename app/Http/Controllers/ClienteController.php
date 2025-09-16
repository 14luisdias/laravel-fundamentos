<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){

        $clientes = Client::get();

        return view('clientes.index',[
            'clientes' => $clientes
        ]);

    }
    public function create(){

        return view('clientes.create');

    }

    public function store(Request $request){

        $novoCliente = new Client;
        $novoCliente->nome = $request->nome;
        $novoCliente->endereco = $request->endereco;
        $novoCliente->descricao = $request->descricao;

        $novoCliente->save();
        
        return redirect('/clientes');

    }
}