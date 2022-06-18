<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'config' => config('site'),
            'user_id' => User::pluck('id')->random(),
        ];
    }
}
