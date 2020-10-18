<?php

namespace Database\Factories;

use App\Models\Departament;
use App\Models\Gadget;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GadgetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gadget::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->jobTitle,
            'code' => Str::random(6),
            'status' => $this->faker->randomElement([true,false]),
            'departament_id' => Departament::all()->random()->id

        ];
    }
}
