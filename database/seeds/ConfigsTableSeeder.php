<?php

use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
          "label" => 'Busquedas en Google',
          "value" =>  '0'
        ]);
        DB::table('configs')->insert([
          "label" => 'Consultas realizadas',
          "value" =>  '0'
        ]);
        DB::table('configs')->insert([
          "label" => 'Clientes',
          "value" =>  '0'
        ]);
    }
}
