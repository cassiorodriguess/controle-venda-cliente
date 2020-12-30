<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\Produtos;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;



class initController extends Controller
{
    
    private $cliente;

    private $produto;

    private $usuario;

    public function __construct(Clientes $clientes,Produtos $produtos,User $usuarios){
    
    $this->middleware('auth');    
     
    $this->cliente = $clientes;    

    $this->produto = $produtos;

    $this->usuario = $usuarios;

    }

    public function index()
    {

        $cliente = $this->cliente->count();

        $produtos = $this->produto->count();

        $usuarios = $this->usuario->count();

        $logado = Auth::user()->id;

        return view('index',compact('cliente','produtos','usuarios','logado'));

    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        dd($this->usuario->create([
            'name'=>$request->name,
            'email'=>$request->email,   
            'password' => Hash::make($request->password)  
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
