<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'username' => 'Nacho',
                'lastname' => 'Mancada',
                'type_document' => 'CC',
                'document_number' => $i.'9',
                'email' => 'user'.'9' . $i . '@example.com',
                'phone_number' => '9'.'12345678' . $i,
                'region' => 'Antioquia',
                'city' => 'Medellin',
                'birthdate' => now()->subYears(20),
                'image_profile' => '',
                'role_id' => 2,
                'status' => true,
                'password' => bcrypt('password' . $i),
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'username' => 'Diego',
                'lastname' => 'Pino',
                'type_document' => 'CC',
                'document_number' => $i .'8',
                'email' => 'user'.'8' . $i . '@example.com',
                'phone_number' => '8'.'12345678' . $i,
                'region' => 'Valle',
                'city' => 'Cartago',
                'birthdate' => now()->subYears(20),
                'image_profile' => '',
                'role_id' => 2,
                'status' => true,
                'password' => bcrypt('password' . $i),
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'username' => 'Daryana',
                'lastname' => 'Manso',
                'type_document' => 'CC',
                'document_number' => $i.'7',
                'email' => 'user' .'7'. $i . '@example.com',
                'phone_number' => '7'.'12345678' . $i,
                'region' => 'Caqueta',
                'city' => 'Sipaquira',
                'birthdate' => now()->subYears(20),
                'image_profile' => '',
                'role_id' => 2,
                'status' => true,
                'password' => bcrypt('password' . $i),
            ]);
        }

    }
}
