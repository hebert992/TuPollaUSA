<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apuesta extends Model
{
    protected $table = "apuesta" ;
    protected $primaryKey ="id_apuesta";
    protected $fillable = [
        'id_cliente', "id_master",'id_polla1',"id_polla2", 'id_polla3',"id_polla4","id_polla5","id_polla6",
        "id_caballo1","id_caballo2","id_caballo3","id_caballo4","id_caballo5","id_caballo6",];

    public function scopeUnit($query,$ID)
    {
       $query->where("id_cliente",$ID);
    }

}
