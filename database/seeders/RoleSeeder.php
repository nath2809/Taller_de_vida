<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Creamos los roles que tendra el sistema
        
        Role::create([
            'name' => 'Administrador'
        ]);

        Role::create([
            'name' => 'Lider'
        ]);


    }
}
