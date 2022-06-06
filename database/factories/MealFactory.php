<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->sentence(2),
            'price'=>$this->faker->numberBetween(2.5,50.8),
            'desc'=> $this->faker->sentence(5),
            'vegetarian'=>$this->faker->boolean(),
            'category_id'=>Category::factory()
        ];
    }
}
