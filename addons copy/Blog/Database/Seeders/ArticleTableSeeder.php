<?php

namespace Addons\Blog\Database\Seeders;

use Addons\Blog\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::factory(20)->create();
    }
}
