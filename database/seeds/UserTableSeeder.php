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
        $fake  =Faker::create();
        for($a=1;$a<44;$a++) {
            DB::table('users')->insert([
                'name' => $fake->name,
                'email' =>$fake->unique()->email,
                'password' => bcrypt('secret'),
                'rol' => "usuario",

            ]);
        }// ENDFOR
        DB::table('users')->insert([
            'name' => "Hebert Ramirez",
            'email' => "hebert992" . '@gmail.com',
            'password' => bcrypt('hebert123'),
            'rol' => "admin",
            'email_confirmado' => 1,
    ]);

    }
}
