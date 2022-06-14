<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;
use App\Models\Site;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function syncAllModulePermissions(Site $site)
    {
        app('permission')->syncAllModulePermissions($site);
        return $this->success('权限同步成功');
    }

    public function index()
    {
        return $this->success(data: PermissionResource::collection(Permission::all()));
    }

    public function store(StorePermissionRequest $request)
    {
        $permission = Permission::create(['name' => $request->name, 'title' => $request->title]);
        return $this->success(data: new PermissionResource($permission));
    }

    public function show(Permission $permission)
    {
        return $this->success(data: new PermissionResource($permission));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->fill($request->input())->save();
        return $this->success(data: new PermissionResource($permission));
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return $this->success("删除成功");
    }
}
