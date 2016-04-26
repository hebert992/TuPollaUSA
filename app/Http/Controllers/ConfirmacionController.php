<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Foundation\Auth\User;
class ConfirmacionController extends Controller
{
    public function confirm($confirmation_code)
    {
        $code_confirmacion  = $confirmation_code;
        if( ! $code_confirmacion)
        {
            
           return Redirect()->to("/");
        }
        $user = User::whereCodeConfirmacion($code_confirmacion)->first();
        if ( ! $user)
        {
            Session::flash('flash_danger',"Codigo de verificacion Incorrecto!");
            return Redirect()->to("/");
        }
        $user->email_confirmado = 1;
        $user->code_confirmacion = null;
        $user->save();
        //Flash::message('You have successfully verified your account. You can now login.');
        Session::flash('flash_success',"Felicidades tu Correo fue confirmado!");
        return Redirect()->to("/");
    }
}
