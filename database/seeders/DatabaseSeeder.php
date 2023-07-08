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
        // User::factory(100)->create();
        Barang::factory(100)->create();
        Kabupaten::factory(60)->create();

        // Barang::create([

        // ]);

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
            'saldo' => 10000000
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
            'provinsi_name' => 'Nanggore Aceh Darussalam'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Sumatera Utara'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Sumatera Selatan'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Sumatera Barat'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Bengkulu'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Riau'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Kepulauan Riau'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Jambi'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Lampung'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Bangka Belitung'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Kalimantan Barat'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Kalimantan Timur'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Kalimantan Selatan'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Kalimantan Tengah'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Kalimantan Utara'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Banten'
        ]);

        Provinsi::create([
            'provinsi_name' => 'DKI Jakarta'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Jawa Barat'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Jawa Tengah'
        ]);

        Provinsi::create([
            'provinsi_name' => 'DI Yogyakarta'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Jawa timur'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Bali'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Nusa Tenggara Timur'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Nusa Tenggara Barat'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Gorontalo'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Sulawesi Barat'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Sulawesi Tengah'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Sulawesi Utara'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Sulawesi Tenggara'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Sulawesi Selatan'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Maluku Utara'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Maluku'
        ]);

        Provinsi::create([
            'provinsi_name' => 'Papua Barat'
        ]);
        
        Provinsi::create([
            'provinsi_name' => 'Provinsi Papua Barat'
        ]);
    }
}
