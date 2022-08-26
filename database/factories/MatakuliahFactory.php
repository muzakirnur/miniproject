<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MatakuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dosen_id' => $this->faker->numberBetween(1, 10),
            'kode_mk' => $this->faker->randomNumber(5, true),
            'name' => $this->faker->words(2, true),
            'sks' => $this->faker->numberBetween(1, 6),
        ];
    }
}
