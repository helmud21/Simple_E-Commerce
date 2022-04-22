<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(mt_rand(2, 6)),
            'slug' => $this->faker->slug(),
            'harga' => $this->faker->regexify('[0-9]{5}'),
            'category_id' => mt_rand(1, 5)
        ];
    }
}
