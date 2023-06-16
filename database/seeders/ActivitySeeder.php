<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{

    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            Activity::create([
                'type' => 'Seminario',
                'name' => 'Actividad ' . $i,
                'author_id' => 1,
                'description' => 'Descripción de la actividad ' . $i,
                'region' => 'Caqueta',
                'city' => 'piedras',
                'participants' => $i * 10,
                'boys' => $i * 5,
                'girls' => $i * 5,
                'attendance' => $i * 8,
                'report' => 'Reporte de la actividad ' . $i,
                'image_activity' => ''
            ]);
        }


        for ($i = 1; $i <= 20; $i++) {
            Activity::create([
                'type' => 'Taller',
                'name' => 'Actividad ' . $i,
                'author_id' => 3,
                'description' => 'Descripción de la actividad ' . $i,
                'region' => '',
                'city' => 'Cali',
                'participants' => $i * 10,
                'boys' => $i * 5,
                'girls' => $i * 5,
                'attendance' => $i * 8,
                'report' => 'Reporte de la actividad ' . $i,
                'image_activity' => ''
            ]);
        }


        for ($i = 1; $i <= 20; $i++) {
            Activity::create([
                'type' => 'Seminario',
                'name' => 'Actividad ' . $i,
                'author_id' => 2,
                'description' => 'Descripción de la actividad ' . $i,
                'region' => 'Antioquia',
                'city' => 'Medellin',
                'participants' => $i * 10,
                'boys' => $i * 5,
                'girls' => $i * 5,
                'attendance' => $i * 8,
                'report' => 'Reporte de la actividad ' . $i,
                'image_activity' => ''
            ]);
        }
    }
}
