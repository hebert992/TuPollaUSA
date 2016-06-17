<?php

namespace App;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',"email_confirmado","rol","code_confirmacion","coins","id_master","master","nick","telefono",
        "date","pais","ciudad","direccion",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',"code_confirmacion","coins",
    ];
    public function GetRol()
    {
       return $this->rol;
    }

    public function scopeName($query, $name)
    {

        if (trim($name) != "")
        {
            $query->where('name', "LIKE", "%$name%");

        }
    }
    public function scopeTienda($query ,$id)
    {
$query->where("id_master",$id);

    }

    public static function Email($email)
    {
        $user = DB::table("users")->where("email",$email)->get();
        return $user;
    }
    public function setPasswordAttribute($value)
    {
        if ( ! empty ($value))
        {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public static  function  OnlyAdmin()
    {
        if(Auth::user()->rol != "admin")
        {

            Session::flash('flash_danger',"Error Sin privilegios suficientes!");
            return Redirect("/home");

        }

    }

    public function scopeTiendas($query)
    {
        $query->where("rol","tienda");
    }

}
