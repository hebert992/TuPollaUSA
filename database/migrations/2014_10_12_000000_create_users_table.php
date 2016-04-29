<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum("rol",["admin","supervisor","usuario","tienda"]);
            $table->integer("email_confirmado")->default(0);
            $table->string("code_confirmacion")->nullable();
                    
            $table->rememberToken();
            $table->timestamps();
        });
         Schema::create('recargas', function (Blueprint $table) {
            $table->increments('id_transaccion');
            $table->integer('id_cliente');
            $table->integer('monto');
            $table->enum("tipo",["efectivo","transferencia","deposito","tdc"]);
            $table->string("referencia");
            $table->timestamps();
        });
        Schema::create('factura', function (Blueprint $table) {
            $table->increments('id_factura');
            $table->integer('id_cliente');
            $table->integer('monto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
