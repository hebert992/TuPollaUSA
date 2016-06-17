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
//reglas
Route::get('/reglas', function () {
    return view('reglas');
});
// como jugar
Route::get('/comojugar', function () {
    return view('comojugar');
});
//validacion de codigo
Route::get('register/verify/{confirmationCode}', 'ConfirmacionController@confirm');
//recargas
Route::get('admin/recarga/{ID}', 'RecargasController@recarga');
Route::post('admin/recarga', 'RecargasController@recargando');

Route::get("test", function() {

    $confirmation_code1 = str_random(40);

    $codigo =(["confirmation_code1"=>"$confirmation_code1",]);
    //----------- enviar mail antes de retornar
    Mail::send("emails.verify", $codigo, function($message)  {
        $message->to("hebert992@gmail.com", "Hebert Ramirez")
            ->subject("Correo de VERIFICACION");
    });
    return view("/home");
});

//TEST 2
Route::get('/test2', 'PollasController@Test');

Route::auth();

Route::get('/home', 'HomeController@index');
//lista de usuarios
Route::get('/admin/usuarios', 'ListUsersController@index');
Route::get('/admin/tiendas', 'ListUsersController@tiendas');
Route::get('/admin/tiendas/{ID}', 'ListUsersController@ListRecargaUnit');
Route::get('/admin/recargas', 'ListUsersController@ListRecargas');
Route::get('/tienda/usuarios', 'ListUsersController@index');

    //pollas
Route::get('/admin/polla', 'PollasController@index');
Route::get('/admin/polla/borrar/{ID}', 'PollasController@BorrarpPolla');
Route::get('/admin/add/polla', 'PollasController@CrearVista');
Route::post('/admin/add/polla', 'PollasController@CrearCrear');
Route::get('/admin/polla/editar/{ID}', 'PollasController@VistaEditarPolla');
Route::post('/admin/polla/editar', 'PollasController@EditarPolla');


//CABALLOS


//borrado de usuarios
Route::post('/admin/borrar', 'ListUsersController@BorrarUsuario');
//Borrar Recarga
Route::post('/admin/borrar/recarga', 'RecargasController@BorrarRecarga');
//edicion de usuarios
Route::get('/admin/editar/{ID}', 'ListUsersController@VistaEditar');
Route::post('/admin/editar/', 'ListUsersController@EditarEditar');
//caballos
Route::get('/admin/add/caballo/{ID}', 'PollasController@VistaCaballo');
Route::post('/admin/add/caballos', 'PollasController@AgregarCaballo');
Route::get('/admin/polla/{ID}/caballos', 'PollasController@PollaCaballo');
Route::get('/admin/caballo/borrar/{ID}', 'PollasController@BorrarCaballo');
Route::get('/admin/caballo/editar/{ID}', 'PollasController@VistaEditarCaballo');
Route::post('/admin/caballo/editar', 'PollasController@EditarCaballo');

//Resultados
Route::get('/admin/add/resultado/{ID}', 'PollasController@VistaResultados'); //admin/add/resultado
Route::post('/admin/add/resultado', 'PollasController@CrearResultados');
//Apuestas
Route::get("/apuestas", "PollasController@VistaApuesta" );
Route::post("/apuestas", "PollasController@CrearApuesta" );
//Registro de usuarios
Route::get("/tienda/registro", "RegisterController@VistaTienda" );
Route::post('/tienda/registro', 'RegisterController@RegistroTienda');
Route::get("/admin/registro", "RegisterController@VistaAdmin" );
Route::post("/admin/registro", "RegisterController@RegistroAdmin" );

//tienda apuesta
Route::get("/tienda/apostar/{ID}", "TiendaController@VistaApuesta" );
Route::post("/tienda/apuesta", "TiendaController@CrearApuesta" );
//tabla de posiciones
Route::get("/ganadores", "PollasController@TablaPosiciones" );
//tabla de programacion
Route::get("/programacion", "PollasController@VistaProgramacion" );

//
Route::get("/usuario/apuestas", "ListUsersController@ListaApuesta" );

//configuracion
Route::get("/admin/config", "ConfigController@Vista" );
Route::post("/admin/config", "ConfigController@Guardar" );//admin/config

//caballo
Route::get("/caballo/{ID}", "PollasController@GetCaballo" );
Route::get("/tienda/apostar/caballo/{ID}", "PollasController@GetCaballo" );

//mercadopago
Route::get('/mercadopago', 'OtrosController@MercadoPago');
Route::post('/mercadopago/pagar', 'OtrosController@MercadoPagoPagar');
Route::get('/mercadopago/recibir', 'OtrosController@MercadoPagoRecibir');
Route::get('/mercadopago/ver', 'OtrosController@MercadoPagoVer');
//Verificacion de apuestas
Route::get('/verificar/{ID}', 'PdfController@invoice');
//
Route::get('/chat', 'ChatController@Vista');
Route::post('/escribir', 'ChatController@Escribir');
Route::get('/llamado', 'ChatController@Llamado');









Route::get('/getnoticias', 'noticiasController@GetNoticias');




Route::resource('noticias', 'noticiasController');

Route::get('noticias/{id}/delete', [
    'as' => 'noticias.delete',
    'uses' => 'noticiasController@destroy',
]);
