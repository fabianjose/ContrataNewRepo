<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

  public function run(){

    DB::table('users')->insert([
      "username" => 'teledisca',
      'password'  =>  Hash::make('nextscale'),
    ]);

  }

}
