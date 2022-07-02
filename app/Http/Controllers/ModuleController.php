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
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
        $this->authorizeResource(Module::class);
    }

    // 模块列表
    public function index()
    {
        $modules = Module::latest()->paginate();
        return ModuleResource::collection($modules);
    }

    // 设计模块
    public function store(StoreModuleRequest $request)
    {
        $configFile = base_path('addons/' . $request->name . '/Config/config.php');
        $config =  ['name' => ucfirst($request->name), "version" => "1.0"] + $request->input();

        Artisan::call("module:make " . $request->name);
        file_put_contents($configFile, "<?php return " . var_export($config, true) . ";");

        copy(public_path('static/preview.jpeg'), base_path('addons/' . $request->name . '/preview.jpeg'));
        copy(base_path('data/module/permissions.php'), base_path('addons/' . $request->name . '/Config/permissions.php'));
        app('module')->syncLocalAllModule();

        return $this->success('模块创建成功');
    }

    // 删除模块
    public function destroy(string $module)
    {
        if (is_dir(base_path('addons/' . $module))) {
            Artisan::call("module:migrate-reset " . $module);
            Storage::disk('addons')->deleteDirectory($module);
        }
        Module::where('name', $module)->delete();

        return $this->success('模块删除成功');
    }
}
