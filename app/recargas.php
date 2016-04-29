<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recargas extends Model
{
    protected $table = 'recargas';
    //
    
     protected $fillable = [
        'id_cliente', 'monto', 'tipo',"referencia",
    ];

}
