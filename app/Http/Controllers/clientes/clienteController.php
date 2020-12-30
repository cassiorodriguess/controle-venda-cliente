<?php

namespace App\Http\Controllers\clientes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clientes;
use App\Servicos;
use Auth;

class clienteController extends Controller
{   

    private $cliente; 
    private $servico;

    public function  __construct(Clientes $clientes,Servicos $servicos){
    
    $this->middleware('auth');    

    $this->cliente = $clientes;    

    $this->servico = $servicos;

    }
    
    public function index()
    {   
        $logado = Auth::user()->id;

        $cliente = $this->cliente
            ->where('cliente_id','=',$logado)
            ->get();

        return view('clientes/cliente',compact('cliente','logado'));
    }

    public function retornaCadastroCliente()
    {
        $logado = Auth::user()->id;

        return view('clientes/cliente_cadastro',compact('logado'));

    }

    public function clientevenda(Request $request){

          
    $this->validate($request, [
        'email' => 'unique:clientes'
    ]);    

    $dados = $this->cliente->create([
    'nome' =>$request->nome,
    'email'=>$request->email,
    'telefone'=>$request->telefone,
    'cpf'=>$request->cpf,
    'estado'=>$request->estado,
    'cidade'=>$request->cidade,
    'bairro'=>$request->bairro,
    'logradouro'=>$request->logradouro,    
    'numero'=>$request->numero,
    'complemento'=> $request->complemento,
    'identidade'=>$request->identidade,
    'data_nascimento'=> $request->data_nascimento,
    'cep'=>$request->cep
    ]);
    
    $clientes =  $this->cliente
    ->orderBy('id','DESC')
    ->get();    

    return response()->json($clientes);    

    }

    public function clientevendaatual(Request $request){

    $id = $request->id;
    
    $clientes = $this->cliente
    ->find($id);   

    $clientes->nome = $request->nome;
    $clientes->email = $request->email;
    $clientes->complemento = $request->complemento;
    $clientes->data_nascimento = $request->data_nascimento;
    $clientes->cpf = $request->cpf;
    $clientes->logradouro = $request->logradouro;
    $clientes->numero = $request->numero;
    $clientes->bairro = $request->bairro;
    $clientes->cidade = $request->cidade;
    $clientes->telefone = $request->telefone;
    $clientes->estado = $request->estado;
    $clientes->identidade = $request->identidade;
    $clientes->cep = $request->cep;

    $dados = $this->cliente
    ->find($id);
        
    if($clientes->save()){
      
    $dados = $this->cliente    
    ->orderBy('id','DESC')
    ->get();    
    

    return response()->json($dados);
        
    }

    return response()->json($dados);
    
    }

    public function create(Request $request)
    {
        $dados = $this->cliente;
        
        $this->validate($request, [
            'email' => 'unique:clientes'
        ]);
        
        $logado = Auth::user()->id;

        $servicos =
            $this->servico
                ->where('cliente_id',$logado) 
                ->get();

        $clientes =
        $this->cliente
            ->where('cliente_id',$logado) 
            ->get();

        $insere = $dados->create($request->all());

        $_servico = 1;

        if($insere && isset($request->servicos)){

         return view('servicos.servicos',compact('logado','servicos','clientes','_servico'));
  
        }else{

         return redirect('/cliente_cadastro')->with('success','Dados cadastrados com sucesso.');

        }
    }
    
    public function edit($id)
    {       
        $dados = $this->cliente
        ->find($id);

        $logado = Auth::user()->id;

       
        return view('clientes/cliente_cadastro',compact('dados','logado'));
    }

    public function update(Request $request)
    {

       $id = $request->idcliente;
       
       $clientes = $this->cliente
       ->find($id);   

       $clientes->nome = $request->nome;
       $clientes->email = $request->email;
       $clientes->complemento = $request->complemento;
       $clientes->data_nascimento = $request->data_nascimento;
       $clientes->cpf = $request->cpf;
       $clientes->logradouro = $request->logradouro;
       $clientes->numero = $request->numero;
       $clientes->bairro = $request->bairro;
       $clientes->cidade = $request->cidade;
       $clientes->telefone = $request->telefone;
       $clientes->estado = $request->estado;
       $clientes->identidade = $request->identidade;
       $clientes->cep = $request->cep;
        
       $clientes->save();

       $dados = $this->cliente
        ->find($id);
       
       $atual = "atual";

       $logado = Auth::user()->id;
        
       return view('clientes/cliente_cadastro',compact('dados','atual','logado'));
        
    }

    public function delete($id)
    {        
        $clientes = $this->cliente
        ->find($id); 
        
        $clientes->delete();

        return redirect('/clientes')->with('success','Cliente foi deletado com sucesso.');
        
    }
}
