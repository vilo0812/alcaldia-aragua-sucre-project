<?php

namespace Database\Seeders;

use App\Models\GadgetLog;
use Illuminate\Database\Seeder;

class GadgetLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GadgetLog::factory(15)->create();
    }
}
