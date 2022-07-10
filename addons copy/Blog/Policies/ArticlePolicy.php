<?php

namespace Addons\Blog\Policies;

use Addons\Blog\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        dd($ability);
    }

    public function viewAny(User $user)
    {
        dd(3);
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Article $article)
    {
        return true;
        dd($article);
    }
}
