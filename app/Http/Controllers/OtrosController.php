<?php

namespace App\Http\Controllers;

use App\recargas;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use SantiGraviano\LaravelMercadoPago\Facades\MP;

class OtrosController extends Controller
{
    public function MercadoPago()
    {
        return view("pagos");


    }
    public function MercadoPagoPagar(Request $request)
    {
        //return view("pagos");
$cantidad = intval($request->get("cantidad"));
        $preference_data = array (
            "items" => array (
                array (
                    "title" => "Coins",
                    "quantity" => $cantidad,
                    "currency_id" => "VEF",
                    "unit_price" => recargas::ValorCoins()
                )

            ),
            "payer" => array (
                "id"=>Auth::user()->id,
                "name"=> Auth::user()->name,
                "email"=> Auth::user()->email,

            )
        );

        try {
            $preference = MP::create_preference($preference_data);
            return redirect()->to($preference['response']['init_point']);
        } catch (Exception $e){
            dd($e->getMessage());
        }
    }

    public function MercadoPagoRecibir(Request $request)
    {
        if ( !ctype_digit($request->get("id"))) {
            http_response_code(400);
            return;
        }

        $payment_info =MP::get_payment_info($request->get("id"));
        if ($payment_info["status"] == 200) {


            $codigo =(["estado"=>$payment_info["response"]["collection"]["status"],
                       "monto"=>$payment_info["response"]["collection"]["total_paid_amount"],

            ]);
            //----------- enviar mail antes de retornar
           $this->MercadopagoMail($codigo,$payment_info);

            if($payment_info["response"]["collection"]["status"]==="approved")
            {
                $datos = User::email($payment_info["response"]["collection"]["payer"]["email"]);
                recargas::create([
                    "id_cliente" => $datos[0]->id,
                    "nick" => $datos[0]->nick,
                    "monto" => $payment_info["response"]["collection"]["total_paid_amount"],
                    "tipo" => "tdc",
                    "referencia" => "Referencia: ".$payment_info["response"]["collection"]["id"],
                    "master" => "MercadoPago",
                    "id_master" => 000,
                ]);
                $userfianl = User::findOrFail($datos[0]->id);
                $userfianl->coins +=($payment_info["response"]["collection"]["total_paid_amount"]/recargas::ValorCoins());
                $userfianl->save();


            }

            return http_response_code(200);
        }
    }

    public function MercadoPagoVer(Request $request)
    {
        $payment_info =MP::get_payment_info($request->get("id"));
    dd($payment_info["response"]["collection"]);
        //$datos = User::email($payment_info["response"]["collection"]["payer"]["email"]);
        //dd($datos[0]->id);
    }
    public function MercadopagoMail($codigo , $payment_info)
    {
        Mail::send("emails.pago", $codigo, function($message)  use ($payment_info) {
            $message->to("hebert992@gmail.com", $payment_info["response"]["collection"]["payer"]["first_name"])
                ->subject("Gracias por su pago");
        });
    }

}
