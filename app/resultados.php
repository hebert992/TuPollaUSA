<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class resultados extends Model
{
    protected $table ="resultado";
    protected $primaryKey="id_resultado";


    protected $fillable = [
        'id_master', 'id_polla', 'win',"place","show","pago_show","pago_win","pago_place",
    ];

    public function scopeUnresultado($query,$id)
    {
        $query->where("id_polla",$id);
    }
    public function polla()
    {
        return $this->hasOne('App\polla',"id_polla","id_polla");
    }
    public function master()
    {
        return $this->hasOne('App\User',"id","id_master");
    }
}
