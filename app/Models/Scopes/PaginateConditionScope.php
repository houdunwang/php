<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

// 分页查询
class PaginateConditionScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        return $builder->when(request('type'), function ($query, $type) {
            $query->where($type, "like", "%" . request('content') . "%");
        });
    }
}
