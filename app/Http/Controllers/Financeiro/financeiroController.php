<?php

namespace App\Http\Controllers\Financeiro;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendas;
use App\Vendas2;
use App\Clientes;
use App\Produtos;

class financeiroController extends Controller
{   
    private $venda;
    private $venda2;
    private $cliente;
    

    public function __construct(Vendas $vendas,Vendas2 $vendas2,Clientes $clientes){
    $this->middleware('auth');    
    $this->venda = $vendas;   
    $this->venda2 = $vendas2;   
    $this->cliente = $clientes;    
    }
    
    public function index()
    {   

   

        $vendas = $this->venda2
        ->select('vendas2s.valor as valorvenda','vendas2s.status',
        'vendas2s.tipo_pg','clientes.nome as cliente','vendas2s.parcelas',
        'vendas2s.tipo_pg','vendas2s.data_faturas')
        ->join('clientes','clientes.id','=','vendas2s.id_cliente')        
        ->get();

        return view('financeiro/recebimentos',compact('vendas'));
    
    }

    
    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
