<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ListUsersController extends Controller
{
    public function index(Request $requests)
    { $usuariovalido= Auth::user();

       // $users = User::name($requests->get("name"))->paginate();
        if(Auth::guest())
        {
            return redirect("/login");
        }
switch($usuariovalido->rol)
{
    case "admin":
        $users = User::name($requests->get("name"))->paginate();
        dd($users);
        return view("admin.ListUsers",compact("users"));

        break;
    case "tienda":
        $users = User::name($requests->get("name"))->tienda($usuariovalido->id)->paginate();

        return view("admin.ListUsers",compact("users"));
        break;
    case "usuario":
        Session::flash('flash_danger',"Error Sin privilegios suficientes!");
        return redirect("/login");
        breal;

}//ENDSWITCH

      /*  if(Auth::guest())
        {
           return redirect("/login");
        }
        $Rol  = $usuariovalido->rol;
        if($Rol == "admin"||$Rol == "supervisor" || $Rol == "tienda")
        {
        return view("admin.ListUsers",compact("users"));
        }
        else
        {
             Session::flash('flash_danger',"Error Sin privilegios suficientes!");
            return Redirect()->to("/");
        }*/
    }

}
