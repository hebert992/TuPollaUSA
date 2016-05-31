<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class pollas extends Model
{
    protected $table= 'pollas';
    protected $primaryKey = 'id_polla';

    /*
  *   Schema::create('pollas', function (Blueprint $table) {
            $table->increments('id_polla')->unsigned();
            $table->string("name");
            $table->string("distancia");
            $table->date('fecha');
            $table->time("hora");
            $table->string("hipodromo");
            $table->integer("caballos_numero");
            $table->integer("pago");
            $table->enum("terreno",["cesped","arena","grava"]);
            $table->integer('id_master')->unsigned();
            $table->timestamps();
  */

    protected $fillable = [
        'name', 'distancia', 'fecha',"hora","hipodromo","caballos_numero","pago","terreno","id_master",
    ];
    public function scopeValidas($query)
     {
         $fechaactual = Carbon::now();
         $fechaactual = $fechaactual->toDateString();
         $horaactual = Carbon::now();
         $horaactual = $horaactual->addMinute(10);
         $horaactual = $horaactual->toTimeString();
             $query->where("fecha",">","2016-05-21");//->where("hora",">=",$horaactual);


     }
    public function caballos()
    {
        return $this->hasMany('App\caballos','id_polla');
    }
    public function master()
    {
        return $this->hasOne('App\User',"id","id_master");
    }
}
