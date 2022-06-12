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
        app('module')->syncModule();

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

        app('module')->syncModule();
    }

    public function show(Module $module)
    {
    }

    public function update(UpdateModuleRequest $request, Module $module)
    {
    }

    public function destroy(Module $module)
    {
        Artisan::call("module:migrate-reset " . $module->name);

        Storage::disk('addons')->deleteDirectory($module->name);
        $module->delete();

        return $this->success();
    }
}
