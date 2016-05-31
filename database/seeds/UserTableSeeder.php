<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        /*
         * Schema::create('pollas', function (Blueprint $table) {
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
        DB::table('users')->insert([
            'name' => "Hebert Ramirez",
            'nick' => "HebertRamirez",
            'email' => "hebert992" . '@gmail.com',
            'password' => bcrypt('hebert123'),
            'rol' => "admin",
            'email_confirmado' => 1,
        ]);
        DB::table('users')->insert([
            'name' => "Carlos Ramirez",
            'nick' => "calalo87",
            'email' => "calalo87" . '@gmail.com',
            'password' => bcrypt('calalo123'),
            'rol' => "admin",
            'email_confirmado' => 1,
        ]);
        $fake  =Faker::create();
        for($a=1;$a<44;$a++) {
            DB::table('users')->insert([
                'nick' => $fake->unique()->userName,
                'name' => $fake->name,
                'date' => $fake->date($format="y-m-d",$max = "now"),
                'email' =>$fake->unique()->email,
                'telefono' => $fake->phoneNumber,
                'password' => bcrypt('secret'),
                'rol' => "usuario",
                'id_master' => 00,
                'master' => "Web",

            ]);
        }// ENDFOR

        //  randomElement($array = array ('a','b','c')) // 'b'
/*
 *  Schema::create('recargas', function (Blueprint $table) {
            $table->increments('id_transaccion');
            $table->integer('id_cliente');
             $table->string("nick");
            $table->integer('monto');
            $table->enum("tipo",["efectivo","transferencia","deposito","tdc"]);
            $table->string("referencia");
             $table->string("master");
             $table->string("id_master");
            $table->timestamps();

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

  Schema::create('caballos', function (Blueprint $table) {
            $table->increments('id_caballo')->unsigned();
            $table->integer('id_polla')->unsigned();
            $table->string("propietario");
            $table->string("jinete");
            $table->integer("peso");
            $table->foreign('id_polla')->references('id_polla')->on('pollas');



            $table->integer('id_master');
            $table->timestamps();
        });
  */for($a=1;$a<7;$a++) {


        DB::table('pollas')->insert([
            'name' => "Polla de Prueba",
            'distancia' => "149km",
            'fecha' => "2016/07/19",
            'hora' => "21:37",
            'hipodromo' => "Estadio de prueba",
            'caballos_numero' => 7,
            'pago' => 81,
            'terreno' => "arena",
            'id_master' => 1,
        ]);
    }
        for($a=1;$a<7;$a++) {
            for($b=1;$b<7;$b++) {
                DB::table('caballos')->insert([
                    'id_polla' => $a,
                    'name' => $fake->name,
                    'propietario' => $fake->name,
                    'entrenador' => $fake->name,
                    'posicion' => $b,
                    'jinete' => $fake->name,
                    'peso' => $fake->numberBetween($min = 111, $max = 180),


                ]);
            }
        }// ENDFOR


        for($a=1;$a<44;$a++) {
            DB::table('recargas')->insert([
                'id_cliente' => $fake->numberBetween($min = 1, $max = 20),
                'nick' => $fake->userName,
                'monto' => $fake->randomElement($array = array (30000,90000,120000)),
                'tipo' =>$fake->randomElement($array = array ("efectivo","transferencia","deposito","tdc")),
                'master' => "seed",
                'id_master' => 00,


            ]);
        }// ENDFOR



    }
}
