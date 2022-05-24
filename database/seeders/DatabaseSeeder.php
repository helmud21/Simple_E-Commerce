<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Barang;
use \App\Models\Provinsi;
use \App\Models\Kabupaten;

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
        Kabupaten::factory(60)->create();

        User::create([
            'name' => 'Helmud Panggabean',
            'provinsi_id' => '3',
            'kabupaten_id' => '5',
            'role' => 'Pembeli',
            'phone_number' => 987654321,
            'email' => 'helmudpgbn@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('helmud'),
            'jalan' => 'Jalan Terusan Ryacudu',
        ]);

        User::create([
            'name' => 'Halak Hita',
            'provinsi_id' => '3',
            'kabupaten_id' => '6',
            'role' => 'Toko',
            'phone_number' => 112233445,
            'email' => 'halakhita@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('lappet'),
            'jalan' => 'Jalan Terusan Ryacudu, Sukarame',
        ]);

        Category::create([
            'category_name' => 'Elektronik',
            'slug' => 'elektronik'
        ]);

        Category::create([
            'category_name' => 'Wanita',
            'slug' => 'wanita'
        ]);

        Category::create([
            'category_name' => 'Pria',
            'slug' => 'pria'
        ]);

        Category::create([
            'category_name' => 'Kecantikan',
            'slug' => 'kecantikan'
        ]);

        Category::create([
            'category_name' => 'Olahraga',
            'slug' => 'olahraga'
        ]);

        Provinsi::create([
            'name' => 'Nanggore Aceh Darussalam'
        ]);

        Provinsi::create([
            'name' => 'Sumatera Utara'
        ]);

        Provinsi::create([
            'name' => 'Sumatera Selatan'
        ]);

        Provinsi::create([
            'name' => 'Sumatera Barat'
        ]);

        Provinsi::create([
            'name' => 'Bengkulu'
        ]);

        Provinsi::create([
            'name' => 'Riau'
        ]);

        Provinsi::create([
            'name' => 'Kepulauan Riau'
        ]);

        Provinsi::create([
            'name' => 'Jambi'
        ]);

        Provinsi::create([
            'name' => 'Lampung'
        ]);

        Provinsi::create([
            'name' => 'Bangka Belitung'
        ]);

        Provinsi::create([
            'name' => 'Kalimantan Barat'
        ]);

        Provinsi::create([
            'name' => 'Kalimantan Timur'
        ]);

        Provinsi::create([
            'name' => 'Kalimantan Selatan'
        ]);

        Provinsi::create([
            'name' => 'Kalimantan Tengah'
        ]);

        Provinsi::create([
            'name' => 'Kalimantan Utara'
        ]);

        Provinsi::create([
            'name' => 'Banten'
        ]);

        Provinsi::create([
            'name' => 'DKI Jakarta'
        ]);

        Provinsi::create([
            'name' => 'Jawa Barat'
        ]);

        Provinsi::create([
            'name' => 'Jawa Tengah'
        ]);

        Provinsi::create([
            'name' => 'DI Yogyakarta'
        ]);

        Provinsi::create([
            'name' => 'Jawa timur'
        ]);

        Provinsi::create([
            'name' => 'Bali'
        ]);

        Provinsi::create([
            'name' => 'Nusa Tenggara Timur'
        ]);

        Provinsi::create([
            'name' => 'Nusa Tenggara Barat'
        ]);

        Provinsi::create([
            'name' => 'Gorontalo'
        ]);

        Provinsi::create([
            'name' => 'Sulawesi Barat'
        ]);

        Provinsi::create([
            'name' => 'Sulawesi Tengah'
        ]);

        Provinsi::create([
            'name' => 'Sulawesi Utara'
        ]);

        Provinsi::create([
            'name' => 'Sulawesi Tenggara'
        ]);

        Provinsi::create([
            'name' => 'Sulawesi Selatan'
        ]);

        Provinsi::create([
            'name' => 'Maluku Utara'
        ]);

        Provinsi::create([
            'name' => 'Maluku'
        ]);

        Provinsi::create([
            'name' => 'Papua Barat'
        ]);
        
        Provinsi::create([
            'name' => 'Provinsi Papua Barat'
        ]);
    }
}
