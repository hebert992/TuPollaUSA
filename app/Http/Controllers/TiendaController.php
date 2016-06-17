<?php

namespace App\Http\Controllers;

use App\apuesta;
use App\caballos;
use App\Config;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TiendaController extends Controller
{
    public function VistaApuesta($ID)
    {

        if(Auth::guest())
        {
            Session::flash("flash_danger", "Porfavor Iniciar seccion para poder apostar!");
            return  Redirect("/login");
        }elseif(Auth::user()->rol==="tienda")
        {
            $user = User::findOrFail($ID);
            $master =Auth::user()->id ;

            $horaactual = Carbon::now()->addMinute(40);
            $caballos = caballos::all();
            $pollas = DB::table("pollas")->where("fecha", ">", $horaactual)->orderby('created_at', 'DESC')->take(6)->get();
            return view("tienda.apuesta",compact("pollas","caballos","user","master"));
        }else
        {
            Session::flash("flash_danger", "Sin privilegios suficientes!!");
            return  Redirect("/");
        }


    }

    public function CrearApuesta(Request $request)
    {
        $user = User::findOrFail($request->get("id_cliente"));

        if(Auth::guest())
        {
            Session::flash("flash_danger", "Porfavor inicia sesion");
            return Redirect("/login");
        }

        $open = Config::apuesta();
        if($open[0]->value===1)
        {
            Session::flash("flash_danger", "Apuestas Temporalmente desabilitadas");
            return Redirect("/home");
        }
        elseif($user->coins >0 && Auth::user()->rol==="tienda")
        {

            $v = Validator::make($request->all(), [

                'id_caballo1' => 'required',
                'id_caballo2' => 'required',
                'id_caballo3' => 'required',
                'id_caballo4' => 'required',
                'id_caballo5' => 'required',
                'id_caballo6' => 'required',




            ]);
            if ($v->fails()) {
                Session::flash("flash_danger", "ERROR! recuerde selecionar 1 caballo por carrera. Tomando en cuenta que
                son seis(6) carreras");
                return redirect()->back()->withInput()->withErrors($v->errors());
            }

            $apu = apuesta::create($request->all());

            $user->coins = $user->coins -1;
            $user->save();
            Session::flash("flash_success", "Tu apuesta fue cargada con exito!!   Tu correo de confirmacion llegara en 5 Minutos");

           $this->factura($apu,$user);




            return Redirect("/");
        }
        else
        {
            Session::flash("flash_danger", "Error Coins insuficientes");
            return Redirect("/");
        }


    }
    public function factura($factura,$user)
    {
        $view =  \View::make('report.apuesta', compact( 'factura'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a6', 'landscape');
        $pdf->save("factura".$user->id.".pdf");
        $dato=(["nick"=> $user->nick]);
        Mail::send("emails.apuesta", $dato, function($message) use ($pdf,$factura,$user)  {
            $message->to("$user->email", $user->nick)
                ->subject("Confirmacion de apuesta ID: $factura->id_factura")
                ->attach("factura".$user->id.".pdf");

        });

    }
}
