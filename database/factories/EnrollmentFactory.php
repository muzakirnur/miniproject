<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'matakuliah_id' => $this->faker->numberBetween(1, 10),
            'mahasiswa_id' => $this->faker->unique()->numberBetween(1, 100),
        ];
    }
}
