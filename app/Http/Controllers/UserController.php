<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Color;
use Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{   

    private $user;
    private $colors;

    public function __construct(User $user,Color $colors){
    $this->middleware('auth');    
    $this->user = $user;
    $this->color = $colors;
    }

    public function getuser(){
     
    $user = Auth::user();  

    $u = $this->user
        ->join('colors','colors.id_user','users.id')
        ->where('users.id',Auth::user()->id)
        ->get();
   
    if(isset($u->topo)){ 
        $user = $u;
        return view('user.user',compact('user'));
    }else{
        return view('user.user',compact('user'));
    }

    }
    public function retornocadastrouser(){

    $logado = Auth::user()->id;     

    return view('user.user_cadastro',compact('logado'));    

    }

    public function create(Request $request)
    {
       
        $dados = $this->user;
        
        $this->validate($request, [
            'email' => 'unique:users'
        ]);
        
        $logado = Auth::user()->id;        

        $insere = $dados
            ->create([
                'name'=>$request->name,
                'email'=>$request->email,   
                'password' => Hash::make($request->password),
                'rua'=>$request->rua,
                'numero'=>$request->numero,
                'bairro'=>$request->bairro,
                'cidade'=>$request->cidade,
                'telefone'=>$request->telefone,
                'acesso'=>$request->acesso,
                'cliente_id'=>$request->cliente_id
            ]);

            return redirect('/Caduser')->with('success','Dados cadastrados com sucesso.');


    }

   
    public function upduser(Request $request){

    $img = "";        

    if(isset($request->file)){   
     
    $file = $request->file('file');

    $nameimg = date("YmdHis").$file->getClientOriginalName();

    $file->move(public_path('images'),$nameimg);

    $img = $nameimg;

    }

    $id = $request->id;

    $newuser = $this->user
        ->find($id);

    $newuser->name = $request->name;
    $newuser->email = $request->email;
    $newuser->rua = $request->rua;
    $newuser->bairro = $request->bairro;
    $newuser->cidade = $request->cidade;
    $newuser->telefone = $request->telefone; 
    $newuser->numero = $request->numero;     
    
    if($img!=""){
    $newuser->img = $img;    
    }

    $newuser->save();
    
    $user = $this->user
    ->find($id);

    return view('user.user',compact('user'));


    }

}
