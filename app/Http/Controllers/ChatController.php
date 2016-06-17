<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ChatController extends Controller
{
    public function Vista()
    {
     return view("Chat");
    }
    public function Escribir()
    {
   Chat::create([
        "nick"=>Auth::user()->nick,
        "mensaje"=>Input::get("chat"),
       "estado"=>1
    ]);

    }

    public function Llamado()
    {
     $datos = Chat::all();
        $datos->each(function($mensaje){
            print("<b>".$mensaje->nick."</b>" ." : ". $mensaje->mensaje . "<br/>");

        });

    }
}
