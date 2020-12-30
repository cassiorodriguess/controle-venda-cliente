<?php

namespace App\Http\Controllers\produtos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produtos;
use App\Categorias;
use Auth;

class produtoController extends Controller
{   
    private $produto;

    private $categoria;

    public function __construct(Produtos $produtos,Categorias $categorias){
    $this->middleware('auth');    
    $this->produto = $produtos;
    $this->categoria = $categorias;    
    }

    public function index()
    {

        $logado = Auth::user()->id;

        $produtos = $this->produto 
         ->where('cliente_id','=',$logado)
         ->get();

        return view('produtos/produto',compact('produtos','logado'));

    }

    public function storeCategoria(Request $request)
    {
        //dd($request->categoria);

        $d = $this->categoria
        ->create($request->all());

        $categorias = $this->categoria 
        ->all();

        $produtos = $this->produto 
        ->all();

        if($d){
         return view('produtos/produto_cadastro',compact('d','categorias','produtos'));   
        }
   
    }


    public function editCategoria($id)
    {   
        $categoria_dados = $this->categoria->find($id);    

        $categorias = $this->categoria->all();

        $produtos =  $this->produto->all();

        return view('produtos/produto_cadastro',compact('categoria_dados','categorias','produtos'));   
    }

    public function updateCategoria(Request $request)
    {       
        $dados = $this->categoria
        ->find($request->id);

        $dados->categoria = $request->categoria;

        $produtos = $this->produto->all();
        
        if($dados->save()){
        $categoriaatual = 1;    
        }else{
        $categoriaatual = 0;    
        }

        $categorias =  $this->categoria->all();

        if($categoriaatual){
            return view('produtos/produto_cadastro',compact('categorias','categoriaatual','produtos'));  
        } 

    }

    public function deleteCategoria($id)
    {
        $dados = $this->categoria
        ->find($id);

        $dados->delete();

        return redirect('/produto_cadastro')->with("success","Categoria deletada com sucesso");
    }

    public function create(Request $request)
    {
        $dados = $this->produto;

        if($dados->create($request->all())){
        
        $categorias = 
        $this->categoria
        ->where('cliente_id','=',$request->cliente_id)
        ->where('categoria','=',$request->categoria)
        ->count();

        if($categorias < 1){

        $this->categoria->create(['cliente_id'=>$request->cliente_id,'categoria'=>$request->categoria]);    

        }

        $produtos = $this->produto
        ->orderBy('id','DESC')
        ->get();    

        $pr = 1; 

        $categorias = 
        $this->categoria
        ->where('cliente_id','=',$request->cliente_id)    
        ->get();

        $logado = $request->cliente_id;    
            

        return view('/produtos/produto_cadastro',compact('produtos','pr','categorias','logado'));    

        }
    }

    public function retornaCadastroProduto()
    {   
        $logado = Auth::user()->id;

        $categorias = $this->categoria 
        ->where('cliente_id','=',$logado)
        ->get();
        
        $produtos = $this->produto
        ->where('cliente_id','=',$logado)        
        ->orderBy('id','DESC')
        ->get();

        return view('produtos/produto_cadastro',compact('categorias','produtos','logado'));   
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        
        $logado = Auth::user()->id;

        $_produtos = $this->produto
        ->find($id);

        $categorias = $this->categoria 
        ->where('cliente_id',$logado)
        ->get();
        
        $produtos = $this->produto
        ->where('cliente_id',$logado)
        ->get();
        
        return view('produtos/produto_cadastro',compact('categorias','produtos','_produtos','logado'));   

    }

    public function update(Request $request)
    {        
       $logado = $request->cliente_id;

       $upd = $this->produto->find($request->id); 
       
       $upd->titulo = $request->titulo;
       $upd->descricao = $request->descricao;
       $upd->preco = $request->preco;
       $upd->categoria = $request->categoria;
       $upd->fornecedor = $request->fornecedor;
       $upd->estoque = $request->estoque;


       if($upd->save()){
           
       $categorias = $this->categoria 
       ->where('cliente_id',$logado)
       ->get();

       $produtos = $this->produto             
        ->where('cliente_id',$logado)
        ->get();

       $atual = 1;
       return view('produtos/produto_cadastro',compact('categorias','produtos','atual','logado'));

       }

    }

    public function destroy($id)
    {
        $del = $this->produto->find($id);
        if($del->delete()){
        return redirect('/produto_cadastro')->with('success','Item deletado com sucesso');    
        }
    }

    public function destroy2($id)
    {
        $del = $this->produto->find($id);
        if($del->delete()){
        return redirect('/produto_cadastro')->with('success','Item deletado com sucesso');    
        }
    }
}
