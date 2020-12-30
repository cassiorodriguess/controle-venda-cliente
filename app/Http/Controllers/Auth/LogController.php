<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LogController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {   
        $credentials = $request->only('email', 'password');

        if(isset($request->remember_token)){

            $remember =  $request->remenber_token;    
           
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],$remember)){
                return redirect('/');
            }else{
                return redirect()->back()->withErrors('Credenciais de acesso incorretas.');
            }

        }else{

            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                return redirect('/');
            }else{
                return redirect()->back()->withErrors('Credenciais de acesso incorretas.');
            }
    
    } 
 
  }

}
