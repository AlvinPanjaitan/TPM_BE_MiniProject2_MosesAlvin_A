<?php

namespace Database\Factories;

use App\Models\Museum;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class MuseumFactory extends Factory
{
    protected $model = Museum::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->text(),
            'location' => $this->faker->address(),
            'category_id' => Category::factory(), // Mengaitkan dengan category yang dibuat secara otomatis
        ];
    }
}
