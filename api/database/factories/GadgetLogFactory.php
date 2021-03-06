<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Gadget;
use App\Models\GadgetLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GadgetLogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GadgetLog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'description' => $this->faker->text($maxNbChars = 150),
            'user_id' => User::all()->random()->id,
            'gadget_id' => Gadget::all()->random()->id

        ];
    }
}
