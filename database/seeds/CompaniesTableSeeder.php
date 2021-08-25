<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('companies')->insert([
        "name" => 'Nextscale',
        "logo"  =>  'foto',
        "nit" =>  '27935371',
        "phone" =>  '04148634004',
        "web" =>  'nextscale.net',
        "highlighted" =>  1,
        "highlighted_expiration"  => date('Y-m-d h:i:s', strtotime("+30 days"))
      ]);
    }
}
