<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
    	  'name'   => 'Admin',
	      'email'   => 'admin@admin.com',
	      'password'  => Hash::make('1234'),
        'rol_id' => 1
    	]);

        User::factory()->create([
          'name'   => 'Secretario-1',
          'email'   => 'secretario1@gmail.com',
          'password'  => Hash::make('1234'),
          'rol_id' => 2
        ]);

        User::factory()->create([
          'name'   => 'Secretario-2',
          'email'   => 'secretario2@gmail.com',
          'password'  => Hash::make('1234'),
          'rol_id' => 2
        ]);

        User::factory()->create([
          'name'   => 'Secretario-3',
          'email'   => 'secretario3@gmail.com',
          'password'  => Hash::make('1234'),
          'rol_id' => 2
        ]);
    }
}
