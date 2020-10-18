<?php

namespace Database\Seeders;

use Database\Seeders\DepartamentSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                MayorSeeder::class,
                DepartamentSeeder::class,
                RolSeeder::class,
                UserTableSeeder::class,
                GadgetSeeder::class,
                PositionSeeder::class,
                EmployeeSeeder::class,
                GadgetLogSeeder::class
            ]
        );
    }
}
