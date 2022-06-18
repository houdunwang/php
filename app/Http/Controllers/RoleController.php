<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index(Site $site)
    {
        $roles = $site->roles()->latest()->paginate(100);
        return RoleResource::collection($roles);
    }

    public function store(StoreRoleRequest $request, Site $site, Role $role)
    {
        $role->fill($request->input() + ['site_id' => $site->id, 'guard_name' => 'sanctum'])->save();

        return $this->success('角色添加成功', data: $role);
    }

    public function show(Site $site, Role $role)
    {
        return $this->success(data: new RoleResource($role));
    }

    public function update(UpdateRoleRequest $request, Site $site, Role $role)
    {
        $role->fill($request->input())->save();
        return $this->success('角色更新成功');
    }

    public function destroy(Site $site, Role $role)
    {
        $role->delete();
        return $this->success(message: '删除成功');
    }

    // 同步角色权限
    public function permission(Request $request, Site $site, Role $role)
    {
        $role->syncPermissions($request->input('permissions'));
        return $this->success('权限设置成功', data: $role->permissions);
    }
}
