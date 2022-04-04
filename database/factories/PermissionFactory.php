<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'title' => $this->faker->word(),
        ];
    }
}
