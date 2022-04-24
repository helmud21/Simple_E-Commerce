<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt($this->faker->unique()->bothify('????????##')),
            'phone_number' => $this->faker->phoneNumber(),
            'jalan' => $this->faker->streetAddress(),
            'kabupaten' => $this->faker->citySuffix(),
            'provinsi' => $this->faker->city()
        ];
    }
}
