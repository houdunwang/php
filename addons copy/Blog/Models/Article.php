<?php

namespace Addons\Blog\Models;

use Addons\AddonModel;
use App\Models\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends AddonModel
{
    use HasFactory;

    protected $table = 'hd_articles';

    protected $fillable = ['title', 'content', 'type'];

    protected static function booted()
    {
        static::addGlobalScope(new SiteScope);
    }

    protected static function newFactory()
    {
        return \Addons\Blog\Database\factories\ArticleFactory::new();
    }
}
