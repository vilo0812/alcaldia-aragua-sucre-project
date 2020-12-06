<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'contact_number' => $this->faker->phoneNumber,
            'contact_email' => $this->faker->unique()->safeEmail,
            'position_id' => Position::all()->random()->id

        ];
    }
}
