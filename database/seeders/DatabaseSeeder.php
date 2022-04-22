<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Barang;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Barang::factory(20)->create();

        Category::create([
            'name' => 'Elektronik',
            'slug' => 'elektronik'
        ]);

        Category::create([
            'name' => 'Wanita',
            'slug' => 'wanita'
        ]);

        Category::create([
            'name' => 'Pria',
            'slug' => 'pria'
        ]);

        Category::create([
            'name' => 'Kecantikan',
            'slug' => 'kecantikan'
        ]);

        Category::create([
            'name' => 'Olahraga',
            'slug' => 'olahraga'
        ]);
    }
}
