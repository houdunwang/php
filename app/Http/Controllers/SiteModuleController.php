<?php

namespace App\Http\Controllers;

use App\Http\Resources\ModuleResource;
use App\Models\Module;
use App\Models\Site;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class SiteModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index(Site $site)
    {
        $modules = $site->modules()->latest()->paginate();
        return ModuleResource::collection($modules);
    }

    public function store(Request $request, Site $site)
    {
        $site->modules()->syncWithoutDetaching([request('mid')]);
        app('permission')->syncAllModulePermissions($site);

        return $this->success('模块添加成功');
    }

    public function destroy(Site $site, Module $module)
    {
        $site->modules()->detach($module->id);
        $site->permissions()->where('module_id', $module->id)->delete();
        return $this->success('模块删除成功');
    }
}
