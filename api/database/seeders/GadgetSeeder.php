<?php

namespace Database\Seeders;

use App\Models\Gadget;
use Illuminate\Database\Seeder;

class GadgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Gadget::factory(20)->create();
    }
}
