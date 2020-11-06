<?php

namespace Database\Seeders;

use App\Models\Departament;
use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departament::create([
        	'name'  => 'departamento-1',
            'mayor_id' => 1
        ]);
        Departament::create([
        	'name'  => 'departamento-2',
            'mayor_id' => 1
        ]);
        Departament::create([
        	'name'  => 'departamento-3',
            'mayor_id' => 1
        ]);
    }
}
