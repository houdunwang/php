<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Site;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    // 设置角色权限
    public function store(Request $request, Site $site, Role $role)
    {
        $role->syncPermissions($request->input('permissions'));
        return $this->success('权限设置成功', data: $role->permissions);
    }
}
