<?php

namespace App\Http\Controllers;

use App\apuesta;
use App\Config;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;


class PdfController extends Controller
{
    public function invoice($ID)
    {


        $factura = apuesta::findOrFail($ID);

        $view =  \View::make('report.apuesta', compact( 'factura'));

        $pdf = App::make('dompdf.wrapper');
        //return \View::make('report.apuesta', compact( 'factura'));
        $pdf->loadHTML($view)->setPaper('a6', 'landscape');

        //$pdf->save("factura.pdf");

        if(Auth::user()->rol==="admin")
        {
            return $pdf->stream("invoice");
        }elseif(Auth::user()->id===apuesta::findOrFail($ID)->id_cliente)
        {
            return $pdf->stream("invoice");
        }elseif(Config::findOrFail(1)->value===1)
        {
            return $pdf->stream("invoice");
        }
        else
        {
            Session::flash("flash_danger", "Privilegios insuficientes !!");
            return Redirect("/");
        }



    }


}
