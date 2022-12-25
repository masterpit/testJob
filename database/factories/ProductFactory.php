<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->word,
            'description' => $this->faker->text(200),
            'category_id' => random_int(21,60),
            'weight' => random_int(10,1000).'.'. random_int(1,20),
            'price' =>  random_int(100,10000)
        ];
    }
}
