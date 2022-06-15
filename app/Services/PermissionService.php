<?php

namespace App\Services;

use App\Models\Permission as ModelsPermission;
use App\Models\Site;

//权限管理服务
class PermissionService
{
    protected $site;

    // 初始化站点模块权限
    public function syncAllModulePermissions(Site $site)
    {
        $site->modules()->each(function ($module) use ($site) {
            $file = base_path("addons/{$module['name']}/Config/permissions.php");
            if (!is_file($file)) return;

            $this->removeNotExistPermissions($site, $file, $module);

            collect(include $file)->each(function ($permission) use ($site, $module) {
                $this->syncPermissions($site, $module, $permission);
            });
        });
    }

    // 删除模块配置中不存在的站点权限
    protected function removeNotExistPermissions($site, $file, $module)
    {
        $names = collect(include $file)->reduce(function ($names, $permission) use ($module) {
            $moduleNames = collect($permission['items'])->reduce(function ($names, $item) use ($module) {
                return $names->push($module['name'] . '_' . $item['name']);
            }, collect([]));

            return [...$names, ...$moduleNames->toArray()];
        }, []);

        ModelsPermission::where('site_id', $site->id)->whereNotIn('name', $names->toArray())->delete();
    }

    // 同步站点权限
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
}
