<?php

namespace Database\Factories;

use FontLib\Table\Type\name;
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
            'name_en' => $this->faker->word(),
            'name_ar' => $this->faker->word(),
            'code' => $this->faker->randomNumber('9'),
            'quantity' => $this->faker->randomNumber('3'),
            'color_en' => $this->faker->colorName(),
            'color_ar' => $this->faker->colorName(),
            'sell_price' => $this->faker->randomNumber('2'),
            'discount_price' => $this->faker->randomNumber('2'),
            'short_descp_en' => $this->faker->text('20'),
            'short_descp_ar' => $this->faker->text('20'),
            'long_descp_en' => $this->faker->text('100'),
            'long_descp_ar' => $this->faker->text('100'),
            'thumbnail' => $this->faker->imageUrl('300', '300'),
            'special_offer' => $this->faker->boolean(),
            'brand' => $this->faker->company(),
            'category_id' => $this->faker->numberBetween(1, 10),
            'subcategory_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
