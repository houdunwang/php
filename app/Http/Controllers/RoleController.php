<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index()
    {
        $roles = Role::all();
        return RoleResource::collection($roles);
    }

    public function store(StoreRoleRequest $request, Role $role)
    {
        $role->fill($request->input())->save();
        return new RoleResource($role);
    }

    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->fill($request->input())->save();
        return new RoleResource($role);
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return response(['message' => '删除成功']);
    }

    public function syncPermission(Role $role, Request $request)
    {
        $role->syncPermissions($request->input('permissions'));
        return response(['message' => '同步成功']);
    }
}
