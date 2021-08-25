<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
      $this->call(UsersTableSeeder::class);
      $this->call(DepartmentsTableSeeder::class);
      $this->call(MunicipalitiesTableSeeder::class);
      $this->call(ConfigsTableSeeder::class);
      // $this->call(CompaniesTableSeeder::class);
      // $this->call(ServicesTableSeeder::class);
      // $this->call(OffersTableSeeder::class);
    }
}
