<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class noticias extends Model
{
    
	public $table = "noticias";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "titulo",
		"contenido",
		"autor"
	];

	public static $rules = [
	    "titulo" => "required",
		"contenido" => "required",
		"autor" => "required"
	];

}
