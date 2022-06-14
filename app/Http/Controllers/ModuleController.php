<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use App\Http\Resources\ModuleResource;
use App\Models\Module;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::when(request('type'), function ($query, $type) {
            $query->where($type, 'like', "%" . request('content') . "%");
        })->latest()->paginate();

        return ModuleResource::collection($modules);
    }

    public function store(StoreModuleRequest $request)
    {
        $configFile = base_path('addons/' . $request->name . '/Config/config.php');
        $config =  ['name' => ucfirst($request->name), "version" => "1.0"] + $request->input();

        Artisan::call("module:make " . $request->name);
        file_put_contents($configFile, "<?php return " . var_export($config, true) . ";");

        copy(public_path('static/preview.jpeg'), base_path('addons/' . $request->name . '/preview.jpeg'));
        copy(base_path('data/module/permissions.php'), base_path('addons/' . $request->name . '/Config/permissions.php'));
        app('module')->syncModule();

        return $this->success('模块创建成功');
    }

    public function show(Module $module)
    {
    }

    public function destroy(Module $module)
    {
        if (is_dir(base_path('addons/' . $module->name))) {
            Artisan::call("module:migrate-reset " . $module->name);
            Storage::disk('addons')->deleteDirectory($module->name);
        }

        $module->delete();

        return $this->success('模块删除成功');
    }
}
