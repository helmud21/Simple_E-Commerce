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
            'barang_name' => $this->faker->sentence(mt_rand(2, 6)),
            'harga' => $this->faker->regexify('[0-9]{5}'),
            'detail' => $this->faker->paragraph(mt_rand(2, 5)),
            'category_id' => mt_rand(1, 5),
            'user_id' => 12,
            'image' => ''
        ];
    }
}
