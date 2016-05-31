<?php

namespace App\Http\Controllers;

use App\apuesta;
use App\caballos;
use App\Config;
use App\pollas;
use App\resultados;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PollasController extends Controller
{
    public function Test()
    {
        $pollas = pollas::find(1)->caballos;
        dd( $pollas);
    }
    public function index()
    { $fechaactual = Carbon::now()->toDateString();
        $horaactual = Carbon::now()->addMinute(10)->toDateString();




        $pollas = DB::table("pollas")->where("fecha",">",$fechaactual)->where("hora",">","$horaactual")->get();
        //$pollas =pollas::validas();



            return view("admin.ListPollas",compact("pollas"));
    }
    public function CrearVista()
    {
        if(Auth::user()->rol)
        {
            return view("admin.AddPolla");
        }
    }
    public function PollaCaballo($ID)
    {
        $polla = pollas::findOrFail($ID);
        $caballos =pollas::findOrFail($ID)->caballos;
        return view("admin.CaballosPolla",compact("polla"),compact("caballos"));
    }
    public function AgregarCaballo(Request $request)
    {
        if(Auth::user()->rol === "admin") {

            $v = Validator::make($request->all(), [

                'name' => 'required',
                'jinete' => 'required',
                'propietario' => 'required',
                'peso' => 'required',
                'mi' => 'required',



            ]);
            if ($v->fails()) {
                return redirect()->back()->withInput()->withErrors($v->errors());
            }

            caballos::create($request->all());
            Session::flash("flash_success", "Caballo Agregado con exito!!");
            return redirect("/admin/polla");
        }
        else
        {
            Session::flash("flash_danger", "Error Sin privilegios suficientes!");
            return Redirect("/");
        }

    }
    public function CrearCrear(Request $request)
    {
        if (Auth::user()->rol === "admin")
        {

            $v = Validator::make($request->all(), [

                'name' => 'required',
                'hipodromo' => 'required',
                'fecha' => 'required',
                'hora' => 'required',
                'pago' => 'required|numeric',
                'caballos_numero' => 'required|numeric',
                'tipo' => "required|in:arena,grava,cesped",
                'distancia' => 'required|numeric',


            ]);
            if ($v->fails()) {
                return redirect()->back()->withInput()->withErrors($v->errors());
            }

            Session::flash("flash_success", "Carrera creada con exito!!");
            pollas::create($request->all());
            return Redirect("/admin/polla");


        }else{
            Session::flash("flash_danger", "Error Sin privilegios suficientes!");
            return Redirect("/");
        }
    }
    public function VistaCaballo($ID)
    {
        $count = caballos::contarcaballos($ID)->count();
        $count =$count+1;
        $polla = pollas::findOrFail($ID);
        return view("admin.AddCaballos",compact("count"),compact("polla"));

    }
    public function VistaApuesta()
    {
        $open = Config::Apuesta();
        if($open[0]->value===1)
        {
            Session::flash("flash_danger", "Apuestas Temporalmente desabilitadas");
            return Redirect("/home");
        }
        if(Auth::guest())
        {
            Session::flash("flash_danger", "Porfavor Iniciar seccion para poder apostar!");
           return  Redirect("/login");
        }
        else {
            $fechaactual = Carbon::now()->toDateString();
            $horaactual = Carbon::now()->addMinute(10)->toDateString();
            $caballos = caballos::all();

            $pollas = DB::table("pollas")->where("fecha", ">", $fechaactual)->where("hora", ">", "$horaactual")->orderby('created_at','DESC')->take(6)->get();
            return view("Apuesta", compact("pollas"), compact("caballos"));
        }
    }
    public function CrearApuesta(Request $request)
    {

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
        elseif(Auth::user()->coins >0)
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
            apuesta::create($request->all());
            $user = User::findOrFail(Auth::user()->id);
            $user->coins = $user->coins -1;
            $user->save();
            Session::flash("flash_success", "Tu apuesta fue cargada con exito!!");
            return Redirect("/");
        }
        else
        {
            Session::flash("flash_danger", "Error Coins insuficientes");
            return Redirect("/");
        }


    }

    public function VistaResultados($ID)
    {
        $valido = resultados::unresultado($ID);
        if($valido)
        {
            Session::flash("flash_danger","ERROR! ya esta carrera tiene resultados");
           return  Redirect("/admin/polla");
        }
        else {
            $polla = pollas::findOrFail($ID);
            return view("admin.AddResultado", compact("polla"));
        }
    }

    public function CrearResultados(Request $request)
    {

        $v = Validator::make($request->all(), [

            'win' => 'required|numeric',
            'pago_win' => 'required',
            'place' => 'required|numeric',
            'pago_place' => 'required',
            'show' => 'required|numeric',
            'pago_show' => 'required',


        ]);
        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        resultados::create($request->all());
        Session::flash("flash_success", "Resultados agregados con exito!!");
        return Redirect("/admin/polla");

    }

    public function TablaPosiciones()
    {
       // $tablapolla = ["id_polla1","id_polla2","id_polla3","id_polla4","id_polla5","id_polla6"];
        $pollas = DB::table("pollas")->orderby('created_at','DESC')->take(6)->get();
        $resultado = array();

        $apuesta1 = DB::table("apuesta")->where("id_polla1",$pollas[0]->id_polla)->get();
        /* $apuesta2 = DB::table("apuesta")->where("id_polla2",$pollas[1]->id_polla)->get();
        $apuesta3 = DB::table("apuesta")->where("id_polla3",$pollas[2]->id_polla)->get();
        $apuesta4 = DB::table("apuesta")->where("id_polla4",$pollas[3]->id_polla)->get();
        $apuesta5 = DB::table("apuesta")->where("id_polla5",$pollas[4]->id_polla)->get();
        $apuesta6 = DB::table("apuesta")->where("id_polla6",$pollas[5]->id_polla)->get();

        dd($apuesta1,$apuesta2,$apuesta3,$apuesta4,$apuesta5,$apuesta6);
        */
        //OBTENER LOS RESULTADOS DE LAS ULTIMAS SEIS POLLAS
        for($c=0;$c<6;$c++)
        {
            $resultado[$c] = DB::table("resultado")->where("id_polla",$pollas[$c]->id_polla)->get();
        }
        $lenght = sizeof($apuesta1);
        $tablasfinales= array();
        $t = count($resultado);

        if(empty($resultado[5]))
        {
            Session::flash("flash_danger","Aun no se publican todos los resultados!!");
            return Redirect("/home");
        }


          for($a=0;$a<$lenght;$a++)
             {$total=0;
                 for($b=0;$b<6;$b++)
                 {



                     if($apuesta1[$a]->id_polla1===$resultado[$b][0]->id_polla)

                     { $caballo= caballos::findOrFail($apuesta1[$a]->id_caballo1);

                         if($caballo->posicion===$resultado[$b][0]->win)
                         {
                             $total+= $resultado[$b][0]->pago_win;
                         }elseif($caballo->posicion===$resultado[$b][0]->show)
                         {
                             $total+= $resultado[$b][0]->pago_show;
                         }elseif($caballo->posicion===$resultado[$b][0]->place)
                         {
                             $total+= $resultado[$b][0]->pago_place;
                         }
                     }//IF
                     if($apuesta1[$a]->id_polla2===$resultado[$b][0]->id_polla)
                     { $caballo= caballos::findOrFail($apuesta1[$a]->id_caballo2);
                         if($caballo->posicion===$resultado[$b][0]->win)
                         {
                             $total+= $resultado[$b][0]->pago_win;
                         }elseif($caballo->posicion===$resultado[$b][0]->show)
                         {
                             $total+= $resultado[$b][0]->pago_show;
                         }elseif($caballo->posicion===$resultado[$b][0]->place)
                         {
                             $total+= $resultado[$b][0]->pago_place;
                         }
                     }//IF
                     if($apuesta1[$a]->id_polla3===$resultado[$b][0]->id_polla)
                     { $caballo= caballos::findOrFail($apuesta1[$a]->id_caballo3);
                         if($caballo->posicion===$resultado[$b][0]->win)
                         {
                             $total+= $resultado[$b][0]->pago_win;
                         }elseif($caballo->posicion===$resultado[$b][0]->show)
                         {
                             $total+= $resultado[$b][0]->pago_show;
                         }elseif($caballo->posicion===$resultado[$b][0]->place)
                         {
                             $total+= $resultado[$b][0]->pago_place;
                         }
                     }//IF
                     if($apuesta1[$a]->id_polla4===$resultado[$b][0]->id_polla)
                     { $caballo= caballos::findOrFail($apuesta1[$a]->id_caballo4);
                         if($caballo->posicion===$resultado[$b][0]->win)
                         {
                             $total+= $resultado[$b][0]->pago_win;
                         }elseif($caballo->posicion===$resultado[$b][0]->show)
                         {
                             $total+= $resultado[$b][0]->pago_show;
                         }elseif($caballo->posicion===$resultado[$b][0]->place)
                         {
                             $total+= $resultado[$b][0]->pago_place;
                         }
                     }//IF
                     if($apuesta1[$a]->id_polla5===$resultado[$b][0]->id_polla)
                     { $caballo= caballos::findOrFail($apuesta1[$a]->id_caballo5);
                         if($caballo->posicion===$resultado[$b][0]->win)
                         {
                             $total+= $resultado[$b][0]->pago_win;
                         }elseif($caballo->posicion===$resultado[$b][0]->show)
                         {
                             $total+= $resultado[$b][0]->pago_show;
                         }elseif($caballo->posicion===$resultado[$b][0]->place)
                         {
                             $total+= $resultado[$b][0]->pago_place;
                         }
                     }//IF
                     if($apuesta1[$a]->id_polla6===$resultado[$b][0]->id_polla)
                     { $caballo= caballos::findOrFail($apuesta1[$a]->id_caballo6);
                         if($caballo->posicion===$resultado[$b][0]->win)
                         {
                             $total+= $resultado[$b][0]->pago_win;
                         }elseif($caballo->posicion===$resultado[$b][0]->show)
                         {
                             $total+= $resultado[$b][0]->pago_show;
                         }elseif($caballo->posicion===$resultado[$b][0]->place)
                         {
                             $total+= $resultado[$b][0]->pago_place;
                         }
                     }//IF
                 }//for
                 $user = User::findOrFail($apuesta1[$a]->id_cliente);
                 $tablasfinales[$a] = array($user->nick,$total,$apuesta1[$a]->id_apuesta);

             }//for

        $indextablasfinales = count($tablasfinales);
        $definitiva= array();
        if($indextablasfinales>25)
        {for($d=0;$d<25;$d++)
            $definitiva=$tablasfinales[$d];
        }
        else{
            $definitiva=$tablasfinales;
        }
$n= count($definitiva);
        for($i=1;$i<$n;$i++)
        {
            for($j=0;$j<$n-$i;$j++)
            {
                if($definitiva[$j][1]<$definitiva[$j+1][1])
                {$k=$definitiva[$j+1]; $definitiva[$j+1]=$definitiva[$j]; $definitiva[$j]=$k;}
            }
        }
            $final=0 ;
       //dd($definitiva);


       return view("ganadores",compact("definitiva"),compact("final"));
    }

    public function VistaProgramacion()
    {
        $fechaactual = Carbon::now()->toDateString();
        $horaactual = Carbon::now()->addMinute(10)->toDateString();
        $caballos = caballos::all();

        $pollas = DB::table("pollas")->where("fecha", ">", $fechaactual)->where("hora", ">", "$horaactual")->orderby('created_at','DESC')->take(6)->get();
        return view("programacion", compact("pollas"), compact("caballos"));

    }
    public function GetCaballo(Request $request,$ID)
    {
        if($request->ajax())
        {
            $caballo = caballos::findOrFail($ID);
            return response()->json($caballo);
        }

    }

}
