<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\User;
use Illuminate\Support\Facades\Session;
class RegisterController extends Controller
{
    public function VistaTienda()
    {
        if(Auth::guest())
        {
            return redirect("/login");
        }
        switch(Auth::user()->rol)
        {
            case "admin":
                return redirect("/admin/usuarios");
                break;
            case "usuario":
                return redirect("/home");
                break;
            case "tienda":
                return view("tienda.registro");

        }//swith

    }
   public function RegistroTienda(Request $request)
   {   $data  = $request->all();
       $v = Validator::make($request->all(), [

           'name' => 'required|max:255',
           'date' => 'required|max:113',
           'nick' => 'required|max:255|unique:users',
           'apellido' => 'required|max:255',
           'telefono' => 'required|max:255',
           'email' => 'required|email|max:255|unique:users',
           'password' => 'required|min:6|confirmed',
       ]);

       if ($v->fails())
       {
           return redirect()->back()->withInput()->withErrors($v->errors());
       }
       switch(Auth::user()->rol)
       {
           case "admin":
               return redirect("/admin/usuarios");
               break;
           case "usuario":
               return redirect("/home");
               break;

       }//swith
       $confirmation_code1 = str_random(40);





       $codigo =(["confirmation_code1"=>"$confirmation_code1",]);
       //----------- enviar mail antes de retornar
       Mail::send("emails.verify", $codigo, function($message) use ($data) {
           $message->to($data['email'], $data['name'])
               ->subject("Correo de VERIFICACION");
       });
       //---------- mail enviando ahora se procede a crear los registros
       $full_name = $data['name']. " ".$data['apellido'];
       User::create([
           'name' => $full_name,
           'nick' => $data['nick'],
           'telefono' => $data['telefono'],


           'pais' => $data['pais'],
           'ciudad' => $data['ciudad'],
           'direccion' => $data['direccion'],
           'email' => $data['email'],
           'password' => bcrypt($data['password']),
           'rol' => "usuario",
           "master"=>Auth::user()->name,
           "id_master"=> Auth::user()->id,
           'code_confirmacion'=> $confirmation_code1,
       ]);
       Session::flash('flash_success',"Registro  del usuario " . $data['name']);
       return redirect("/tienda/usuarios");
       //-------- registros creados todo positivo!




   }
    public function VistaAdmin()
    {
        if(Auth::guest())
        {
            return redirect("/login");
        }
        switch(Auth::user()->rol)
        {
            case "admin":
                return view("admin.registro");
                break;
            case "usuario":
                return redirect("/home");
                break;
            case "tienda":
                return redirect("/tienda/registo");

        }//swith
    }
    public function RegistroAdmin(Request $request)
    {
        $data  = $request->all();
        $v = Validator::make($request->all(), [

            'name' => 'required|max:255',
            'date' => 'required|max:113',
            'nick' => 'required|max:255|unique:users',
            'apellido' => 'required|max:255',
            'telefono' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        switch(Auth::user()->rol)
        {
            case "tienda":
                return redirect("/tienda/usuarios");
                break;
            case "usuario":
                return redirect("/home");
                break;

        }//swith

        $confirmation_code1 = str_random(40);

        $codigo =(["confirmation_code1"=>"$confirmation_code1",]);
        //----------- enviar mail antes de retornar
        Mail::send("emails.verify", $codigo, function($message) use ($data) {
            $message->to($data['email'], $data['name'])
                ->subject("Correo de VERIFICACION");
        });
        //---------- mail enviando ahora se procede a crear los registros
        $full_name = $data['name']. " ".$data['apellido'];
        User::create([
            'name' => $full_name,
            'nick' => $data['nick'],
            'telefono' => $data['telefono'],
            'pais' => $data['pais'],
            'ciudad' => $data['ciudad'],
            'direccion' => $data['direccion'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'rol' => $data["tipo"],
            "master"=>Auth::user()->name,
            "id_master"=> Auth::user()->id,
            'code_confirmacion'=> $confirmation_code1,
        ]);
        Session::flash('flash_success',"Registro  del usuario " . $data['name']);
        return redirect("/tienda/usuarios");
        //-------- registros creados todo positivo!

    }


}
