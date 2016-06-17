<?php

namespace App\Http\Controllers;


use App\apuesta;
use App\recargas;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
class ListUsersController extends Controller
{
    public function tiendas(Request $request)
    {
        $usuariovalido= Auth::user();

        // $users = User::name($requests->get("name"))->paginate();
        if(Auth::guest())
        {
            return redirect("/login");
        }
        switch($usuariovalido->rol)
        {
            case "admin":
                $users = User::name($request->get("name"))->tiendas()->paginate();
                return view("admin.ListTienda",compact("users"));
                break;
            case "tienda":
                Session::flash('flash_danger',"Error Sin privilegios suficientes!");
                return redirect("/");
                break;
            case "usuario":
                Session::flash('flash_danger',"Error Sin privilegios suficientes!");
                return redirect("/");
                break;

        }//ENDSWITCH
    }
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
    public function ListRecargas(Request $request)
    {
        $usuariovalido= Auth::user();

        // $users = User::name($requests->get("name"))->paginate();
        if(Auth::guest())
        {
            return redirect("/login");
        }
        switch($usuariovalido->rol)
        {
            case "admin":
                $recargass = recargas::name($request->get("name"))->fecha($request->date1,$request->date2)->paginate();
                return view("admin.ListRecargas",compact("recargass"));
                break;
            case "tienda":
                Session::flash('flash_danger',"Error Sin privilegios suficientes!");
                return redirect("/");
                break;
            case "usuario":
                Session::flash('flash_danger',"Error Sin privilegios suficientes!");
                return redirect("/");
                break;

        }//ENDSWITCH

    }
    public function EditarEditar(Request $request)
    {
        if(Auth::user()->rol != "admin")
        {
            Session::flash('flash_danger',"Error Sin privilegios suficientes!");
            return Redirect("/home");

        }
        $data  = $request->all();
        $v = Validator::make($request->all(), [

            'name' => 'required|max:255',
            'date' => 'required|max:10|min:10',
            'telefono' => 'required|max:255',
            'password' => 'min:6|confirmed',
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $user = User::findOrFail($request->get("id"));
        $user->fill($request->all());
        $user->save();
        Session::flash('flash_success',"Stud $user->nick Editado con exito!");
        return Redirect("/admin/usuarios");
    }
    public function VistaEditar($ID)
    {
        if(Auth::user()->rol != "admin")
        {
            Session::flash('flash_danger',"Error Sin privilegios suficientes!");
            return Redirect("/home");

        }
        $user=User::findOrFail($ID);
        return view("admin.EditUser",compact("user"));
    }
    public function BorrarUsuario(Request $request)
    {
        if(Auth::user()->rol != "admin")
        {
            Session::flash('flash_danger',"Error Sin privilegios suficientes!");
            return Redirect("/home");

        }

        $user = User::findOrFail($request->get("id"));
        Session::flash('flash_success',"El Sr(a)" .$user->nick. " Fue eliminado con exito!");
        User::destroy($request->get("id"));
        return Redirect("/home");



    }
    public function ListRecargaUnit($ID,Request $request)
    {
        $usuariovalido= Auth::user();
        if(Auth::guest())
        {
            return redirect("/login");
        }

        switch($usuariovalido->rol)
        {
            case "admin":

                $recargass = recargas::recarg($ID)->fecha($request->date1,$request->date2)->paginate();

                return view("admin.ListRecargas",compact("recargass"));
                break;
            case "tienda":
                Session::flash('flash_danger',"Error Sin privilegios suficientes!");
                return redirect("/");
                break;
            case "usuario":
                Session::flash('flash_danger',"Error Sin privilegios suficientes!");
                return redirect("/");
                break;

        }//ENDSWITCH
    }
    public function ListaApuesta()
    {
        $apuestas = apuesta::unit(Auth::user()->id)->paginate();
        return view("ListApuestas",compact("apuestas"));

    }


}
