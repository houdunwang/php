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
        $this->site = $site;

        Module::collections()->each(function ($module) use ($site) {
            $file = $module->getPath() . '/Config/permissions.php';
            if (!is_file($file)) return;

            collect(include $file)->each(function ($permission) use ($module) {
                $this->syncPermissions($module, $permission);
            });
        });
    }

    protected function syncPermissions($module, $permission): void
    {
        collect($permission['items'])->each(function ($item) use ($module) {
            $data = [
                'title' => $item['title'],
                'name' => "S" . $this->site->id . '-' . $item['name'],
                'site_id' => $this->site->id,
                'module' => $module->getName(),
            ];

            ModelsPermission::updateOrCreate($data);
        });
    }

    public function addRoles(...$names): void
    {
        collect($names)->each(fn ($name) => Role::create(['name' => $name]));
    }
}
