<?php

namespace Database\Factories;

use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'title' => $this->faker->word(),
            'site_id' => Site::value('id')
        ];
    }
}
