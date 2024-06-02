<?php

namespace Database\Factories;

use App\Models\Cars;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cars>
 */
class CarsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Cars::class;
    public function definition(): array
    {
        return [
            'category_id' => Category::factory()->create()->id,
            'cars_description' => $this->faker->paragraph,
            'cars_price' => $this->faker->numberBetween(10000, 1000000),
            'cars_image' => $this->faker->imageUrl(),
            'cars_brand' => $this->faker->company,
            'cars_model' => $this->faker->word,
            'cars_nopol' => $this->faker->bothify('?? #### ??'),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
