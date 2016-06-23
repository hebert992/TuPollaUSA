<?php

namespace App\Http\Controllers;

use App\apuesta;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ApuestasController extends Controller
{
    public function ListApuestas(Request $request)
    {
        $final=0;
       switch(Auth::user()->rol)
       {
           case "admin": $apuestas = apuesta::name($request->get("name"))->orderBy("created_at","DESC")->paginate();

               return view("admin.ListApuestas",compact("apuestas","final"));
           break;
           case "tienda": $apuestas= apuesta::tienda(Auth::user()->id)->name($request->get("name"))->paginate();
              // dd($apuestas);
               return $apuestas;
               break;
           default :  Session::flash("flash_danger", "Privilegios insuficientes!!");
               return redirect("/");



       }

    }
}
