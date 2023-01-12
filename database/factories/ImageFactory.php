<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    //automatically search in public folder
    public function definition()
    {
        $filename = $this->fake()->numberBetween(1,10). ".jpg";
        return [
            "path" =>"img/products/{$filename}",
        ];
    }


    public function user()
    {
        $filename = $this->fake()->numberBetween(1,6). ".jpg";

        return $this->state([
            "path" =>"img/users/{$filename}",
        ]);
    }
}
