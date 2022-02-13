<?php

namespace Database\Factories;

use App\Models\Teachers;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'dob' => $this->faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d'),
            'gender' => rand(1, 2),
            'assigned_teacher' => $this->faker->unique()->numberBetween(1, Teachers::count()),
            'created_by' => 1,
        ];
    }
}
