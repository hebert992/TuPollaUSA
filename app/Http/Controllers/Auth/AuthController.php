<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;




class AuthController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'date' => 'required|max:113',
            'nick' => 'required|max:255|unique:users',
            'apellido' => 'required|max:255',
            'telefono' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
         
 $confirmation_code1 = str_random(40);
     
                 $full_name = $data['name']. " ".$data['apellido'];
         
         
         
    $codigo =(["confirmation_code1"=>"$confirmation_code1",]);
    //----------- enviar mail antes de retornar 
    Mail::send("emails.verify", $codigo, function($message) use ($data) {
        $message->to($data['email'], $data['name']." ".$data['apellido'])
        ->subject("Correo de VERIFICACION");
    });
    //---------- mail enviando ahora se procede a crear los registros
        return User::create([
            'name' => $full_name,
            'nick' => $data['nick'],
            'telefono' => $data['telefono'],


            'pais' => $data['pais'],
            'ciudad' => $data['ciudad'],
            'direccion' => $data['direccion'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'rol' => "usuario",
            'code_confirmacion'=> $confirmation_code1
        ]);
        //-------- registros creados todo positivo!
  


    }
}
