<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recargas extends Model
{
    protected $table = 'recargas';
    //
    
     protected $fillable = [
        'id_cliente', 'monto', 'tipo',"referencia","master","id_master","nick",
    ];
    public static function ValorCoins()
    {
        return 3000;
    }
    public function scopeName($query,$name)
    {
        if (trim($name) != "")
        {
            $query->where('nick', "LIKE", "%$name%");
        }
    }
    public function scopeRecarg($query,$id)
    {
        $query->where("id_master",$id);

    }
    public function scopeFecha($query , $desde,$hasta)
    {//SELECT * FROM recargas WHERE created_at >= '2016-05-07' AND created_at <= '2016-05-09'
        if (trim($desde) != ""&& trim($hasta) != "")
        {
            $query->where("created_at", ">=", $desde)->where("created_at", "<=", $hasta);
        }

    }

}
