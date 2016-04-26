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

Route::post('/sesion', 'AuthController@authenticate');

Route::get('/sesion', function () {
    return view('auth.login');
});

Route::get('register/verify/{confirmationCode}', 'ConfirmacionController@confirm');


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
