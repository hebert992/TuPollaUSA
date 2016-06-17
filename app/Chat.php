<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chat extends Model
{
    protected $table="chat";
    protected $fillable=["nick","mensaje","estado"];

    public static function Last($unit)
    {

        $mensajes = DB::table("Chat")->take($unit)->get();
        return $mensajes;
    }
    public function scopeTest($query)
    {
        // $pollas = DB::table("pollas")->orderby('created_at','ASC')->take(6)->get();
        $query->ordenby("created_at","DESC")->take(24)->get();
    }

}
