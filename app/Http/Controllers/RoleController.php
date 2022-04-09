<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;
use InvalidArgumentException;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index()
    {
        $roles = Role::all();
        return $this->success(data: RoleResource::collection($roles));
    }

    public function store(StoreRoleRequest $request, Role $role)
    {
        $role->fill($request->input())->save();
        return $this->success(data: new RoleResource($role));
    }

    public function show(Role $role)
    {
        return $this->success(data: new RoleResource($role));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->fill($request->input())->save();
        return $this->success(data: new RoleResource($role));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return $this->success(message: '删除成功');
    }

    /**
     * 设置角色权限
     * @param Role $role
     * @param Request $request
     * @return Response|ResponseFactory
     * @throws BindingResolutionException
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     * @throws InvalidArgumentException
     */
    public function permission(Role $role, Request $request)
    {
        $role->syncPermissions($request->input('permissions'));
        return $this->success('权限设置成功', data: $role->permissions);
    }
}
