<?php

namespace Database\Factories;

use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'site_id' => Site::inRandomOrder()->first()->id,
            'guard_name' => 'sanctum'
        ];
    }
}
