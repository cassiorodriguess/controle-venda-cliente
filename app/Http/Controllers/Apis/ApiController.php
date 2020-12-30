<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clientes;
use App\Produtos;
use App\Vendas2;
use App\Vendas;
use App\Servico_clientes;
use PDF;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class ApiController extends Controller
{
    
    private $cliente;
    private $produto;
    private $venda;
    private $recebimento;
    private $servico_cliente;

    public function __construct(Clientes $clientes,Produtos $produtos,Vendas $vendas,Vendas2 $recebimento,Servico_clientes $servico_clientes){
    $this->cliente = $clientes;
    $this->produto = $produtos;
    $this->venda = $vendas;
    $this->recebimento = $recebimento;
    $this->servico_cliente = $servico_clientes;
    }

    public function busca(Request $request){

    $produtos =
      $this->produto
      ->where('titulo','LIKE',"%$request->src%")
      ->count();

    if($produtos > 0){

      $produtos =
      $this->produto
      ->where('titulo','LIKE',"%$request->src%")
      ->get();
  
     return response()->json($produtos);  

    }else{

      $clientes = 
      $this->cliente
      ->where('nome','LIKE',"%$request->src%")
      ->count();
      
      if($clientes > 0){

      $clientes = 
      $this->cliente
      ->where('nome','LIKE',"%$request->src%")
      ->get(); 

      return response()->json($clientes); 
    
      }

    }  


    }
    
   public function justPDF(){

    $body = "";

    $produtos = $this->produto->all();

     foreach($produtos as $produto){
    
        $new =  "
        <tr>
            <td>$produto->id</td>
            <td>$produto->titulo</td>
            <td>$produto->descricao</td>
            <td>$produto->preco</td>
            <td>$produto->created_at</td>
            <td>$produto->updated_at</td>
        </tr>";

        $body.=$new;

    } 

    $estruturaTable = '  
    <html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    
        <style>
        table{
        margin:auto;   
        border:1px solid #ccc;    
        }  
        .table-g{
        margin-left:0px;  
        margin:auto;   
        border:1px solid #ccc;                             
        }
        .table-g th{
        width:100px;   
        text-align:left;
        padding:8px;    
        }  
        table td{
        width:100px;    
        padding:8px;    
        border:1px solid #ccc;
        }  
      </style>
    </head>
    <body>
    <br>   
    <h4 style="text-align:center">TABELA DE PRODUTOS</h4>   
    <br>
    <br>
    <table class="table-g" border="1">
        <th>Código</th>
        <th>Título</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Criado em</th>        
        <th style="padding-right:20px">Modificado</th>
    </table>
    <br>  
    <table class="table" border="1">
    <tbody>
    '.$body.'          
    </tbody>         
   </table>
   <body>
   <html>
   ';

    $html = $estruturaTable;
        
    $pdf = PDF::loadHTML($html);/* ->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf'); */
    return $pdf->download('produtos.pdf');

   }

}
