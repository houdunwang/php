<?php

namespace App\Models\Scopes;

trait ScopeTrait
{
    public function scopeQueryCondition($query)
    {
        return $query->when(request()->query('field'), function ($query, $field) {
            $query->where($field, "like", "%" . request()->query('content') . "%");
        });
    }
}
