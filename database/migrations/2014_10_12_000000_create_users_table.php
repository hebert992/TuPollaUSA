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
            $table->string('nick')->unique();
            $table->string('name');
            $table->string('telefono');
            $table->date('date');
            $table->string('pais')->default("Sin especificar");
            $table->string('ciudad')->default("Sin especificar");
            $table->string('direccion')->default("Sin especificar");
            $table->string('email')->unique();
            $table->string('password');
            $table->integer("coins")->default(0);
            $table->enum("rol", ["admin", "usuario", "tienda"]);
            $table->string("master")->default("Web");
            $table->integer("id_master")->default(00);
            $table->integer("email_confirmado")->default(0);
            $table->string("code_confirmacion")->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('recargas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cliente');
            $table->string("nick");
            $table->integer('monto');
            $table->enum("tipo", ["efectivo", "transferencia", "deposito", "tdc"]);
            $table->string("referencia");
            $table->string("master");
            $table->string("id_master");

            $table->timestamps();
        });

        Schema::create('pollas', function (Blueprint $table) {
            $table->increments('id_polla')->unsigned();
            $table->string("name");
            $table->string("distancia");
            $table->date('fecha');
            $table->time("hora");
            $table->string("hipodromo");
            $table->integer("caballos_numero");
            $table->integer("pago");
            $table->enum("terreno", ["cesped", "arena", "grava"]);
            $table->integer('id_master')->unsigned();
            $table->foreign('id_master')->references('id')->on('users');
            $table->timestamps();
        });
        Schema::create('caballos', function (Blueprint $table) {
            $table->increments('id_caballo')->unsigned();
            $table->integer('id_polla')->unsigned();
            $table->string("name");
            $table->string("propietario");
            $table->string("entrenador");
            $table->string("jinete");
            $table->integer("peso");
            $table->integer("mi");
            $table->integer("posicion");
            $table->foreign('id_polla')->references('id_polla')->on('pollas');


            $table->integer('id_master');
            $table->timestamps();
        });
        Schema::create('config', function (Blueprint $table) {
            $table->increments('id_config')->unsigned();
            $table->string("name")->unique();
            $table->string("value");
            $table->timestamps();
        });

        Schema::create('apuesta', function (Blueprint $table) {
            $table->increments('id_apuesta')->unsigned();
            $table->integer('id_cliente')->unsigned();
            $table->integer('id_polla1')->unsigned();
            $table->integer('id_polla2')->unsigned();
            $table->integer('id_polla3')->unsigned();
            $table->integer('id_polla4')->unsigned();
            $table->integer('id_polla5')->unsigned();
            $table->integer('id_polla6')->unsigned();
            $table->integer('id_caballo1')->unsigned();
            $table->integer('id_caballo2')->unsigned();
            $table->integer('id_caballo3')->unsigned();
            $table->integer('id_caballo4')->unsigned();
            $table->integer('id_caballo5')->unsigned();
            $table->integer('id_caballo6')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('users');
            $table->foreign('id_polla1')->references('id_polla')->on('pollas');
            $table->foreign('id_polla2')->references('id_polla')->on('pollas');
            $table->foreign('id_polla3')->references('id_polla')->on('pollas');
            $table->foreign('id_polla4')->references('id_polla')->on('pollas');
            $table->foreign('id_polla5')->references('id_polla')->on('pollas');
            $table->foreign('id_polla6')->references('id_polla')->on('pollas');
            $table->foreign('id_caballo1')->references('id_caballo')->on('caballos');
            $table->foreign('id_caballo2')->references('id_caballo')->on('caballos');
            $table->foreign('id_caballo3')->references('id_caballo')->on('caballos');
            $table->foreign('id_caballo4')->references('id_caballo')->on('caballos');
            $table->foreign('id_caballo5')->references('id_caballo')->on('caballos');
            $table->foreign('id_caballo6')->references('id_caballo')->on('caballos');


            $table->timestamps();
        });

        Schema::create('resultado', function (Blueprint $table) {
            $table->increments('id_resultado')->unsigned();
            $table->integer("id_polla")->unsigned();
            $table->integer("win");
            $table->float("pago_win");
            $table->integer('place');
            $table->float("pago_place");
            $table->integer('show');
            $table->float("pago_show");
            $table->integer('id_master')->unsigned();
            $table->foreign('id_master')->references('id')->on('users');
            $table->foreign('id_polla')->references('id_polla')->on('pollas');
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
        Schema::drop('caballos');
        Schema::drop('pollas');
        Schema::drop('users');
        Schema::drop('factura');
        Schema::drop('recargas');

    }
}
