<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'name'         => 'Pedro Pérez',
            'email'        => 'pperez@example.co',
            'gender'       => 'M',
            'area_id'      => 3,
            'notification' => 1,
            'description'  => 'Hola mundo',
        ]);

        Employee::create([
            'name'         => 'Amalia Bayona',
            'email'        => 'abayona@example.co',
            'gender'       => 'F',
            'area_id'      => 6,
            'notification' => 0,
            'description'  => 'Para contactar a Amalia Bayona, puede escribir al correo electrónico abayona@example.co',
        ]);
    }
}
