<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Museum;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan data kategori
        Category::factory()->create([
            'name' => 'Art',
            'description' => 'Art related exhibitions',
        ]);
        
        Category::factory()->create([
            'name' => 'Science',
            'description' => 'Science related exhibitions',
        ]);

        // Menambahkan data museum
        Museum::factory(20)->create(); // Menambahkan 20 museum secara otomatis
    }
}

