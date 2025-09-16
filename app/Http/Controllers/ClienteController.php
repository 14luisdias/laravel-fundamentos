<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Lista os Clientes do Banco de dados
     */
    public function index(){

        $clientes = Client::get();

        return view('clientes.index',[
            'clientes' => $clientes
        ]);

    }

    /**
     * Direciona para a view que tem o formularios de um novo cliente
     */
    public function create(){

        return view('clientes.create');

    }


    /**
     * salva no banco de dados os dados que vem do formulario de cadastro ou atualização de clientes
     */
    public function store(Request $request){



        $request->validate([
            'nome'=> ['required', 'min:3', 'max:100'],
            'endereco'=> ['required', 'min:3', 'max:200'],
            'descricao'=> ['required']
        ]);


        if (!isset($request->id)) {
            $cliente = new Client;
        }else{
            $cliente = Client::find($request->id);
        }
        
        $cliente->nome = $request->nome;
        $cliente->endereco = $request->endereco;
        $cliente->descricao = $request->descricao;
        
        $cliente->save();
        
        return redirect('/clientes');

    }

    /**
     * direciona para a view que vai atualizar o registro do cliente
     * passando um id
     */
    public function update(int $id){

        $clientes = Client::find($id);
        

        return view('clientes.update',[
            'clientes' => $clientes
        ]);
        
    }
}