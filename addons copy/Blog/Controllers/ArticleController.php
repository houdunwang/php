<?php

namespace Addons\Blog\Controllers;

use Addons\Blog\Models\Article;
use Addons\Blog\Transformers\ArticleResource;
use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'show']);
        $this->authorizeResource(Article::class, 'article', ['except' => 'index']);
    }

    public function index(Site $site)
    {
        return ArticleResource::collection(Article::paginate(10));
    }

    public function store(Request $request, Site $site, Article $article)
    {
        $article->site()->associate($site);
        $article->fill($request->input())->save();

        return $this->success('文章添加成功', $article);
    }

    public function show(Request $request, Site $site, Article $article)
    {
        return $this->success(data: $article);
    }

    public function update(Request $request, Site $site, Article $article)
    {
        $article->fill($request->input())->save();

        return $this->success('文章更新成功', $article->refresh());
    }

    public function destroy(Site $site, Article $article)
    {
        $article->delete();
        return $this->success('删除成功');
    }
}
