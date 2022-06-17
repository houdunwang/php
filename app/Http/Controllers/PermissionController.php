<?php

namespace App\Http\Controllers;

use App\Http\Resources\PermissionResource;
use App\Models\Site;

//权限
class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index(Site $site)
    {
        $permissions = $site->permissions()->latest()->paginate(1000);
        return PermissionResource::collection($permissions);
    }

    //更新站点权限
    public function updateSitePermissions(Site $site)
    {
        app('permission')->syncAllModulePermissions($site);
        return $this->success('站点权限表更新成功');
    }
}
