<?php

namespace App\Http\Controllers\vendas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendas;
use App\Vendas2;
use App\Produtos;
use App\Clientes;
use Cielo\API30\Merchant;
use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Cielo\API30\Ecommerce\Payment;
use Cielo\API30\Ecommerce\Request\CieloRequestException;

class VendasController extends Controller
{   

    private $venda;    

    private $produto;

    private $cliente;

    private $venda2;

    public function __construct(Vendas $vendas,Vendas2 $vendas2,Produtos $produtos,Clientes $clientes){
    $this->middleware('auth');    
    $this->venda = $vendas;
    $this->produto = $produtos;
    $this->cliente = $clientes;
    $this->venda2 = $vendas2;
    }

    public function index()
    {   
    
    $vendas = $this->venda
    ->select('vendas.id','vendas.valor as valorvenda','vendas.quantidade',
    'vendas.created_at as created_at','vendas.updated_at as updated_at','vendas.status','vendas.tipo_pg',
    'produtos.titulo','produtos.descricao','clientes.nome')
    ->join('produtos','produtos.id','=','vendas.id_produto') 
    ->join('clientes','clientes.id','=','vendas.id_cliente')
    ->get();

    return view('vendas/vendas',compact('vendas'));

    }

    public function buscacliente(Request $request){
    $clientes = $this->cliente
    ->orderBy('id','DESC')
    ->get();
    return response()->json($clientes);
    }
    
    public function busca2(Request $request){
    $product = $request->product;    
    $nov = $this->produto->where('titulo','LIKE','%'.$product.'%')->get();
    return response()->json($nov);   
    }

    public function gerarvenda(Request $request){

    $idcliente = $request->id_cliente;
    
    $tipopg = $request->tipo_pg;
   
    $data = $request->data_pg;

    $parcelas = "";

    $data_faturas = "";

    if(isset($request->parcelas)){

    $parcelas = $request->parcelas;
    $parc = explode('x de',$parcelas);
    $numero_parcelas = $parc[0];

    function somar_datas( $numero, $tipo ){
        switch ($tipo) {
          case 'd':
              $tipo = ' day';
              break;
          case 'm':
              $tipo = ' month';
              break;
          case 'y':
              $tipo = ' year';
              break;
          }	
          return "+".$numero.$tipo;
      }
      
      for($i = 2; $i <= $numero_parcelas + 1;$i++){

        $data = somar_datas($i, 'm'); 
       
        $data_faturas .=  date('d-m-Y', strtotime($data))." ";
  
      }

    }


    $dados = json_decode($request->dados, true);

    $venda = $this->venda;

    $total = 0;

    foreach($dados as  $produto){
    
    $total+=$produto['quantidade'] * $produto['valoruni'];

    $venda->create([
    'quantidade'=>$produto['quantidade'],
    'valor'=>$produto['valoruni'],
    'id_produto'=>$produto['id'],
    'id_cliente'=>$idcliente,
    'tipo_pg'=>$tipopg,
    'status'=>'',
    'parcelas'=>$parcelas,
    'data_faturas'=>$data_faturas
    ]);    

    }
    
    $status = "";
    
    if($tipopg=="Cartão de crédito"){
    $status = "AGUARDANDO PAGAMENTO";
    }else {
    $status = "PAGO";    
    }

    $this->venda2->create([
    'valor'=>$total,
    'id_cliente'=>$idcliente,
    'tipo_pg'=>$tipopg,
    'status'=>$status,
    'parcelas'=>$parcelas,
    'data_faturas'=>$data_faturas
    ]); 

    $vendas = $this->venda
    ->select('vendas.id','vendas.valor as valorvenda','vendas.quantidade',
    'vendas.created_at as created_at','vendas.updated_at as updated_at','vendas.status','vendas.tipo_pg',
    'produtos.titulo','produtos.descricao','clientes.nome')
    ->join('produtos','produtos.id','=','vendas.id_produto') 
    ->join('clientes','clientes.id','=','vendas.id_cliente')
    
    ->get();

    return view('vendas/vendas',compact('vendas'));

    }

    public function checkoutboleto(Request $request){

    $idcliente = $request->id_cliente;
    
    $data = $request->data_pg;

    $dados = json_decode($request->dados, true);

    $venda = $this->venda;

    $total = 0;

    // Configure o ambiente
    $environment = $environment = Environment::sandbox();

    // Configure seu merchant

    $merchant = new Merchant('seu id merchant cielo');

    // Crie uma instância de Sale informando o ID do pedido na loja

    $id_venda_instance = rand(111,9999999999);

    $id_venda_boleto = rand(1,9999999999);

    $vencimento  = $request->data_pg;

    $valor = explode('.',$request->total);

    $nuenovalor = $valor[0].$valor[1];

    $sale = new Sale($id_venda_instance);

    // Crie uma instância de Customer informando o nome do cliente,
    // documento e seu endereço
    $customer = $sale->customer($request->nome)
                    ->setIdentity($request->identidade)
                    ->setIdentityType($request->cpf)
                    ->address()->setZipCode($request->cep)
                                ->setCountry('BRA')
                                ->setState($request->estado)
                                ->setCity($request->cidade)
                                ->setDistrict($request->bairro)
                                ->setStreet($request->rua)
                                ->setNumber($request->numero);

    // Crie uma instância de Payment informando o valor do pagamento
    $payment = $sale->payment($nuenovalor)
                    ->setType(Payment::PAYMENTTYPE_BOLETO)
                    ->setAddress('Avenida Maria silva ribeiro')
                    ->setBoletoNumber($id_venda_boleto)
                    ->setAssignor('LOJA HYPER DESIGN E APP')
                    ->setDemonstrative('SERVIÇO WEB 3D')
                    ->setExpirationDate($vencimento)
                    ->setIdentification($id_venda_boleto)
                    ->setInstructions('Boleto deve ser pago em agências bancárias ou nas lotéricas até o vencimento.');

    // Crie o pagamento na Cielo
    try {
        // Configure o SDK com seu merchant e o ambiente apropriado para criar a venda
        $sale = (new CieloEcommerce($merchant, $environment))->createSale($sale);

        // Com a venda criada na Cielo, já temos o ID do pagamento, TID e demais
        // dados retornados pela Cielo
        $paymentId = $sale->getPayment()->getPaymentId();
        $boletoURL = $sale->getPayment()->getUrl();

      /*   printf("URL Boleto: %s\n", $boletoURL); */

      foreach($dados as  $produto){

        $total+=$produto['quantidade'] * $produto['valoruni'];
        
        $venda->create([
        'quantidade'=>$produto['quantidade'],
        'valor'=>$produto['valoruni'],
        'id_produto'=>$produto['id'],
        'id_cliente'=>$idcliente,
        'tipo_pg'=>"boleto",
        'status'=>'AGUARDANDO PAGAMENTO',
        'data_faturas'=>$data
        ]);    
     
        }   
    
        $this->venda2->create([
        'valor'=>$request->total,
        'id_cliente'=>$idcliente,
        'tipo_pg'=>"boleto",
        'status'=>'AGUARDANDO PAGAMENTO',
        'data_faturas'=>$data
        ]);  

      $vendas = $this->venda
      ->select('vendas.id','vendas.valor as valorvenda','vendas.quantidade',
      'vendas.created_at as created_at','vendas.updated_at as updated_at','vendas.status','vendas.tipo_pg',
      'produtos.titulo','produtos.descricao','clientes.nome')
      ->join('produtos','produtos.id','=','vendas.id_produto') 
      ->join('clientes','clientes.id','=','vendas.id_cliente')
      ->get(); 

       return view('vendas/vendas',compact('boletoURL','vendas'));

    } catch (CieloRequestException $e) {
        // Em caso de erros de integração, podemos tratar o erro aqui.
        // os códigos de erro estão todos disponíveis no manual de integração.
        $error = $e->getCieloError();

    }    



    }


}
