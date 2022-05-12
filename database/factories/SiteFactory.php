<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\site>
 */
class SiteFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->word(10),
            'url' => $this->faker->url(),
            'address' => $this->faker->sentence(),
            'email' => $this->faker->email(),
            'tel' => $this->faker->phoneNumber(),
        ];
    }
}
