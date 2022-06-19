<?php

namespace App\Services;

use App\Models\Module as ModelsModule;
use Nwidart\Modules\Facades\Module;

/**
 * 模块服务
 */
class ModuleService
{
    //同步本地模块到数据表
    public function syncLocalAllModule()
    {
        $names = Module::collections()->map(fn ($module) => $module->getName());
        ModelsModule::whereNotIn('name', $names->toArray())->delete();

        Module::collections()->map(function ($module) {
            $config = (include $module->getPath() . "/Config/config.php") + [
                'preview' => url('addons/' . $module->getName() . '/preview.jpeg'),
                'install' => false
            ];

            ModelsModule::updateOrCreate(
                ['name' => $module->getName()],
                $config
            );
        });
    }
}
