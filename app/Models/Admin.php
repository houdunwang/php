<?php

namespace App\Models;

use App\Models\Scopes\PaginateConditionScope;
use App\Models\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope(new PaginateConditionScope);
        static::addGlobalScope(new SiteScope);
    }
}
