<?php

namespace App\Services;

use App\Models\Permission as ModelsPermission;
use App\Models\Site;

//权限管理服务
class PermissionService
{
    protected $site;

    protected $names = [];

    // 初始化站点模块权限
    public function syncAllModulePermissions(Site $site)
    {
        $site->modules()->each(function ($module) use ($site) {
            $file = base_path("addons/{$module['name']}/Config/permissions.php");
            if (!is_file($file)) return;

            collect(include $file)->each(function ($permission) use ($site, $module) {
                $this->syncPermissions($site, $module, $permission);
            });
        });

        // 删除模块配置中不存在的站点权限
        ModelsPermission::where('site_id', $site->id)->whereNotIn('name', $this->names)->delete();
    }

    // 同步站点权限
    protected function syncPermissions(Site $site, $module, $permission): void
    {
        collect($permission['items'])->each(function ($item) use ($site, $module) {
            $name = $module->name . "_" . $item['name'];
            $data = [
                'site_id' => $site->id,
                'module_id' => $module->id,
                'name' => $name,
            ] + $item;
            $this->names[] = $name;
            ModelsPermission::updateOrCreate($data);
        });
    }
}
