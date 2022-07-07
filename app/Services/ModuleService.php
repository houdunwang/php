<?php

namespace App\Services;

use App\Models\Module as ModelsModule;
use Artisan;
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

    /**
     * 初始模块数据
     *
     * @param [type] $name 模块名
     * @param [type] $config 配置
     */
    public function initModuleData($name, $config)
    {
        $configFile = base_path('addons/' . $name . '/Config/config.php');
        Artisan::call("module:make " . $name);
        file_put_contents($configFile, "<?php return " . var_export($config, true) . ";");

        copy(public_path('static/preview.jpeg'), base_path('addons/' . $name . '/preview.jpeg'));
        copy(base_path('data/module/permissions.php'), base_path('addons/' . $name . '/Config/permissions.php'));
        app('module')->syncLocalAllModule();
    }
}
