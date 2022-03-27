<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'name' => 'Administrativa y Financiera',
        ]);

        Area::create([
            'name' => 'Ingeniería',
        ]);

        Area::create([
            'name' => 'Desarrollo de Negocio',
        ]);

        Area::create([
            'name' => 'Proyectos',
        ]);

        Area::create([
            'name' => 'Servicios',
        ]);

        Area::create([
            'name' => 'Calidad',
        ]);
    }
}