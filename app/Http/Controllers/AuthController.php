<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Response;
use Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
class AuthController extends Controller
{
  
     public function authenticate(Request $request)
    {
         //VALIDANDO DATOS 
         $v = Validator::make($request->all(), [
            
            
            'email'    => 'required|email|exists:users',
           
            'password' => 'required|min:7'
        ]);
         
          if ($v->fails())
        {
             return redirect()->back()->withInput()->withErrors($v->errors());
        }
        
        // FIN DE VALIDACION DE DATOS
        
       ////---------------------
        
        // INICIO DE SESION -----------
        $correo = $request->input('email');
        $pass = $request->input('password');
      
        
        if (Auth::attempt(['email' => $correo,'password' =>$pass, 'email_confirmado' => 1])) {
       
       
            return redirect()->to("/home");
           
            
    }
        else
        {
       //return redirect()->back()->withInput()->with('message', 'Login Failed');
    
   
              Session::flash('flash_message', "Error de Combinacion O cuenta no activa");
             return redirect()->back()->withInput();
}
    }
    
   
}
