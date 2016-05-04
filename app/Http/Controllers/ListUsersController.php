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
    {

        $users = User::name($requests->get("name"))->paginate();

        $usuariovalido= Auth::user();
        if(Auth::guest())
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
        }
    }
}
