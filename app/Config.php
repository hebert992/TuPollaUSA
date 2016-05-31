<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Config extends Model
{
    protected $table = "config";
    protected $primaryKey= "id_config";
    protected $fillable=["name","value"];

    public static function Apuesta()
    {
        return DB::table("config")->where("id_config",1)->get();
    }
}
