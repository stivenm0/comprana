<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->sentence(3);
        return [
            'name' => $name, 
            'slug' => Str::slug($name),
            'description'=> fake()->paragraph(),
            'price'=> rand(1000, 100000),
            'stock'=> rand(100, 1000),
            'section_id' => Section::inRandomOrder()->pluck('id')->first()
        ];
    }
}
