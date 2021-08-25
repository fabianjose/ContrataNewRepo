<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('offers')->insert([
        "company" => 1,
        "service"  => 1,
        "benefits" =>  'sendo plan',
        "fields_value" =>  '1: eduardo',
        "tariff" =>  50,
        "points"  =>  5,
        "type"  =>  'company',
        "department"  =>  11,
        "municipality"  =>  107,
        "highlighted" =>  1,
        "highlighted_expiration"  => date('Y-m-d h:i:s', strtotime("+30 days"))
      ]);
    }
}
