<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MayorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\App\Models\Mayor::create([
    		'name' => 'sucre'
    	]);
    }
}
