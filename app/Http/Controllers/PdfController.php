<?php

namespace App\Http\Controllers;

use App\apuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Requests;
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
        $confirmation_code1 = str_random(40);
        //$pdf->save("factura.pdf");

    /*    $codigo =(["confirmation_code1"=>"$confirmation_code1",]);

        //----------- enviar mail antes de retornar
        Mail::send("emails.verify", $codigo, function($message) use ($pdf)  {
            $message->to("hebert992@gmail.com", "Hebert Ramirez")
                ->subject("Correo de VERIFICACION")
                ->attach("factura.pdf");

        });
    */
        return $pdf->stream("invoice");
    }


}
