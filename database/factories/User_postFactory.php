<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User_post>
 */
class User_postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $image = $this->faker->image('public/uploads',640,480,null,false);
        return [
            'post_caption'=> $this->faker->sentence(6),
            'post_image'=> $image,
            'poster_name'=>$this->faker->name(),
        ];
    }
}
