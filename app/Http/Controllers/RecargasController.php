<?php

namespace App\Http\Controllers;

use App\recargas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use App\Http\Requests;


use Illuminate\Support\Facades\Session;

class RecargasController extends Controller
{
    public function recarga($ID)
    { $master = Auth::user();
        if(Auth::guest())
        {
            return redirect("/login");
        }
        if($master->rol=== "usuario")
        {
            Session::flash("flash_danger","Privilegios insuficientes tipo de usuario: ". "$master->rol");
            return Redirect("/admin/usuarios");
        }

        $usuario = DB::table('users')->where('id', $ID)->first();

        return view("admin.recarga",compact("usuario"));
    }

    public function recargando(Request $request)
    {   $master = Auth::user();

        $datos = $request->all();
        if(Auth::guest())
        {
            return redirect("/login");
        }
        if($master->rol=== "usuario")
        {
            Session::flash("flash_danger","Privilegios insuficientes tipo de usuario: ". "$master->rol");
            return Redirect("/admin/usuarios");
        }

//flash_danger
        $cliente= DB::table('users')->where('id', $datos['id'])->first();

        //VALIDANDO TIPO USUARIO
        if($master->rol=== "tienda")
        {
if($master->id !==  $cliente->id_master)
{
    Session::flash("flash_danger","Privilegios insuficientes");
    return Redirect("/admin/usuarios");
}//endif
        }//endif

        //SI EL USUARIO ES TIENDA SE COMPRUEBA QUE El ID SEA IGUAL AL ID_MASTER

       //SE PROCEDE A CREAR LA RECARGA EN LA DB
        recargas::create([
            "id_cliente"=> $datos['id'],
            "monto"=> $datos['monto'],
            "tipo"=>$datos['tipo'],
            "referencia"=>$datos['referencia'],
            "master"=>$master->name,
            "id_master"=>$master->id

        ]);

       // RECARGA CREADA

        // SE PROCEDE A RECARGAR AL USUARIO
        Session::flash("flash_success","Recarga al Sr(a) ". $datos['name']. " Fue exitosa");
        $total = $cliente->coins + $datos['monto'];
        DB::table('users')
            ->where('id', $datos['id'])
            ->update(['coins' =>$total]);
       return  Redirect("/admin/usuarios");
    }
}
