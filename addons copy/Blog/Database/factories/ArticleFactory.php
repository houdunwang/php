<?php

namespace Addons\Blog\Database\factories;

use App\Models\Site;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Addons\Blog\Models\Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'content' => $this->faker->paragraphs(5, true),
            'site_id' => Site::first()->id
        ];
    }
}
