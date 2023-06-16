<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      
      
      //Roles y permisos
      $this->call(RoleSeeder::class);
      $this->call(PermissionSeeder::class);
      // $this->call(UserSeeder::class);
      // $this->call(ActivitySeeder::class);
    }
}
