<?php

use App\Models\User;

function create($class, array $attributes = [])
{
    return $class::factory()->create($attributes);
}
