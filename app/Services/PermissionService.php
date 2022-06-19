<?php

namespace App\Services;

use App\Models\Permission;
use App\Models\Site;

/**
 * 权限管理服务
 */
class PermissionService
{
    protected $names = [];

    // 初始化站点模块权限
    public function syncAllSitePermissions()
    {
        Site::all()->each(function ($site) {
            $this->addSiteModulePermission($site);

            $this->addSiteSystemPermission($site);
        });
    }

    //添加站点系统权限
    protected function addSiteSystemPermission(Site $site)
    {
        collect(config('sitePermissions'))->each(function ($permission) use ($site) {
            collect($permission['items'])->each(function ($item) use ($site) {
                $name = "S" . $site->id . '_SYSTEM_' . $item['name'];

                $data = [
                    'site_id' => $site->id,
                    'module_id' =>  null,
                    'name' => $name,
                    'guard_name' => 'sanctum'
                ] + $item;

                Permission::updateOrCreate($data);
            });
        });
    }

    //添加站点拥有的模块的权限
    protected function addSiteModulePermission(Site $site)
    {
        $site->modules()->each(function ($module) use ($site) {
            $file = base_path("addons/{$module['name']}/Config/permissions.php");
            if (!is_file($file)) return;

            collect(include $file)->each(function ($permission) use ($site, $module) {
                $this->addMoulePermissions($site, $permission, $module);
            });
        });

        // 删除模块配置中不存在的站点权限
        Permission::where('site_id', $site->id)->whereNotIn('name', $this->names)->delete();
    }

    //模块权限入库
    protected function addMoulePermissions(Site $site, $permission, $module): void
    {
        collect($permission['items'])->each(function ($item) use ($site, $module) {
            $name = "S" . $site->id . '_' . $module->name . "_" . $item['name'];

            $data = [
                'site_id' => $site->id,
                'module_id' => $module->id ?? null,
                'name' => $name,
                'guard_name' => 'sanctum'
            ] + $item;
            $this->names[] = $name;
            Permission::updateOrCreate($data);
        });
    }
}
