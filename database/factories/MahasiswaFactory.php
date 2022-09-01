<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
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
            'user_id' => $this->faker->unique()->numberBetween(1, 100),
            'nim' => $this->faker->randomNumber(9, true),
            'alamat' => $this->faker->address(),
            'tgl_lahir' => $this->faker->dateTimeThisDecade(),
            'tempat_lahir' => $this->faker->word(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
        ];
    }
}
