<?php

namespace Database\Seeders;

use App\Models\Museum;
use App\Models\Category;
use Illuminate\Database\Seeder;

class MuseumSeeder extends Seeder
{
    public function run()
    {
        // Pastikan kategori 'Art' dan 'Science' ada di tabel categories
        $artCategory = Category::firstOrCreate(['name' => 'Art'], ['description' => 'Art related exhibitions']);
        $scienceCategory = Category::firstOrCreate(['name' => 'Science'], ['description' => 'Science related exhibitions']);

        // Menambahkan data museum dummy
        Museum::factory(20)->create(); // Mengisi 20 data museum menggunakan factory
    }
}
