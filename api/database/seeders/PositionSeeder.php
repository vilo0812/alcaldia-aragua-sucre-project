<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
        	'name' => 'tecnico'
        ]);

        Position::create([
        	'name' => 'programador'
        ]);

        Position::create([
        	'name' => 'gerente'
        ]);

        Position::create([
        	'name' => 'encargado'
        ]);

        Position::create([
        	'name' => 'supervisor'
        ]);
    }
}
