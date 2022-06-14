<?php

namespace App\Services;

use App\Models\Permission as ModelsPermission;
use App\Models\Site;
use Nwidart\Modules\Facades\Module;
use Spatie\Permission\Models\Role;

class PermissionService
{
    protected $site;

    public function syncAllModulePermissions(Site $site)
    {
        $site->modules()->each(function ($module) use ($site) {
            $file = base_path("addons/{$module['name']}/Config/permissions.php");
            if (!is_file($file)) return;

            collect(include $file)->each(function ($permission) use ($site, $module) {
                $this->syncPermissions($site, $module, $permission);
            });
        });
    }

    protected function syncPermissions(Site $site, $module, $permission): void
    {
        collect($permission['items'])->each(function ($item) use ($site, $module) {
            $data = [
                'site_id' => $site->id,
                'module_id' => $module->id,
                'name' => $module->name . "_" . $item['name'],
            ] + $item;

            ModelsPermission::updateOrCreate($data);
        });
    }

    public function addRoles(...$names): void
    {
        collect($names)->each(fn ($name) => Role::create(['name' => $name]));
    }
}
