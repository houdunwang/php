<?php

namespace App\Models\Scopes;

trait ScopeTrait
{
    public function scopeQueryCondition($query)
    {
        return $query->when(request()->query('searchFields'), function ($query, $searchFields) {
            collect(explode(',', $searchFields))->each(function ($field) use ($query) {
                $query->orWhere($field, "like", "%" . request()->query('searchContent') . "%");
            });
        });
    }
}
