<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Desarrollador',
        ]);

        Role::create([
            'name' => 'Analista',
        ]);

        Role::create([
            'name' => 'Tester',
        ]);

        Role::create([
            'name' => 'Diseñador',
        ]);

        Role::create([
            'name' => 'Profesional PMO',
        ]);

        Role::create([
            'name' => 'Profesional de servicios',
        ]);

        Role::create([
            'name' => 'Auxiliar administrativo',
        ]);

        Role::create([
            'name' => 'Codirector',
        ]);
    }
}