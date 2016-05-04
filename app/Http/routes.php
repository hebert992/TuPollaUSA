<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
 * Registration
 */
//autentificacion
Route::post('/sesion', 'AuthController@authenticate');

Route::get('/sesion', function () {
    return view('auth.login');
});
//validacion de codigo
Route::get('register/verify/{confirmationCode}', 'ConfirmacionController@confirm');
//recargas
Route::get('admin/recarga/{ID}', 'RecargasController@recarga');
Route::post('admin/recarga', 'RecargasController@recargando');

Route::get("test", function() {
    $confirmation_code1 = str_random(40);
    /* @var $data type */
    $data =(["confirmation_code1"=>"$confirmation_code1"]);
    Mail::send("emails.verify", $data, function($message) {
        $message->to("Hebert992@gmail.com", "Hebert Ramirez")
        ->subject("Correo de prueba");
    });
});

Route::auth();

Route::get('/home', 'HomeController@index');
//lista de usuarios
Route::get('/admin/usuarios', 'ListUsersController@index');






