<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Permission::create([
            'name' => 'users'
        ]);
        Permission::create([
            'name' => 'edit'
        ]);
        Permission::create([
            'name' => 'update'
        ]);
        Permission::create([
            'name' => 'activities'
        ]);

        Permission::create([
            'name' => 'profile'
        ]);
    }
}
