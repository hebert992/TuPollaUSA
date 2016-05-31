<?php

namespace App\Http\Controllers;

use App\Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ConfigController extends Controller
{
    public function Vista()
    {
        if(Auth::guest())
        {
            return Redirect("/login");
        }

        if(Auth::user()->rol==="admin")
        {
            return view("admin.Config");
        }
        else
        {
            return redirect("/home");
        }
    }

    public function Guardar(Request $request)
    {
        if(Auth::guest())
        {
            return Redirect("/login");
        }
        if(Auth::user()->rol==="admin") {
            $apuesta = Config::findOrFail(1);
            $apuesta->value = $request->get("apuesta");
            $apuesta->save();
            Session::flash("flash_success", "Tu Configuracion fue guardada con exito!!");
            return Redirect("/admin/config");
        }
        else
        {
            return redirect("/home");
        }
    }
}
