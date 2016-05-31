<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class caballos extends Model
{
    protected $table= 'caballos';
    protected $primaryKey = 'id_caballo';
/*
 *  Schema::create('caballos', function (Blueprint $table) {
            $table->increments('id_caballo')->unsigned();
            $table->integer('id_polla')->unsigned();
            $table->string("propietario");
            $table->string("jinete");
            $table->integer("peso");
            $table->foreign('id_polla')->references('id_polla')->on('pollas');



            $table->integer('id_master');
            $table->timestamps();
        });
 */
    public function pollas(){
        $this->belongsTo("App\pollas","id_polla");
    }
    public function master()
    {
        return $this->hasOne('App\User',"id","id_master");
    }
    public static function UnitCaballos($id_caballo)
    {
        return caballos::where("id_caballo",$id_caballo)->get();
    }

    public function scopeContarcaballos($query,$id)
    {
        $query->where("id_polla","$id");
    }
    protected $fillable = [
     'name', 'id_polla',"id_master", 'propietario',"jinete","hipodromo","peso","mi","posicion","name","entrenador",];


    
}
