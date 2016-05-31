<?php

namespace App\Http\Controllers;

use App\recargas;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


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
    {
        $master = Auth::user();
        $v = Validator::make($request->all(), [

            'email' => 'required|email|exists:users',
            'monto' => 'required|numeric',
            'tipo' => "required|in:transferencia,efectivo,deposito",
            'referencia' => 'required|min:7',


        ]);
        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }


        $datos = $request->all();
        if (Auth::guest()) {
            return redirect("/login");
        }
        if ($master->rol === "usuario") {
            Session::flash("flash_danger", "Privilegios insuficientes tipo de usuario: " . "$master->rol");
            return Redirect("/admin/usuarios");
        }

//flash_danger
        $cliente = DB::table('users')->where('id', $datos['id'])->first();

        //VALIDANDO TIPO USUARIO
        if ($master->rol === "tienda") {
            if ($master->id !== $cliente->id_master) {
                Session::flash("flash_danger", "Privilegios insuficientes");
                return Redirect("/admin/usuarios");
            }//endif
        }//endif

        //SI EL USUARIO ES TIENDA SE COMPRUEBA QUE El ID SEA IGUAL AL ID_MASTER

        //SE PROCEDE A CREAR LA RECARGA EN LA DB


        $montovalido = $datos['monto'] / recargas::ValorCoins();
        if (is_float($montovalido)) {
            Session::flash("flash_danger", "ERROR!!, Monto invalido, recuerde que cada coins vale 3000 BSF");
            return Redirect()->back();
        } elseif (is_integer($montovalido)) {

            recargas::create([
                "id_cliente" => $datos['id'],
                "nick" => $datos['nick'],
                "monto" => $datos['monto'],
                "tipo" => $datos['tipo'],
                "referencia" => $datos['referencia'],
                "master" => $master->nick,
                "id_master" => $master->id

            ]);
        // SE PROCEDE A RECARGAR AL USUARIO
        Session::flash("flash_success", "Recarga al Sr(a) " . $datos['name'] . " Fue exitosa");
        $total = $cliente->coins + $montovalido;
        DB::table('users')
            ->where('id', $datos['id'])
            ->update(['coins' => $total]);
        return Redirect("/admin/usuarios");
    }
        else
        {
            Session::flash("flash_danger", "ERROR!!, Monto invalido, recuerde que cada coins vale 3000 BSF");
            return Redirect()->back();
        }
    }
    public function BorrarRecarga(Request $request)
    {

        $recarga = recargas::findOrFail($request->get("id_transaccion"));

        $user = User::findOrFail($recarga->id_cliente);
        $coins = $recarga->monto / recargas::ValorCoins();
        $user->coins= $user->coins - $coins;
        $user->save();
        Session::flash('flash_success',"La Recarga Echa por $recarga->master para $recarga->nick Fue Eliminada");
        //recargas::destroy($request->get("id"));
        return Redirect("/home");
    }
}
