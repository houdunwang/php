<?php

namespace App\Services;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionService
{
    public function addPermissions(...$names): void
    {
        collect($names)->each(fn ($name) => Permission::create(['name' => $name]));
    }

    public function addRoles(...$names): void
    {
        collect($names)->each(fn ($name) => Role::create(['name' => $name]));
    }
}
