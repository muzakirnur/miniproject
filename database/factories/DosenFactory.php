<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DosenFactory extends Factory
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
            'nip' => $this->faker->randomNumber(9, true),
            'alamat' => $this->faker->address(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
        ];
    }
}
