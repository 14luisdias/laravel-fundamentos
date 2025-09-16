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

    public function update(int $id){

        $clientes = Client::find($id);
        

        return view('clientes.update',[
            'clientes' => $clientes
        ]);
        
    }
}