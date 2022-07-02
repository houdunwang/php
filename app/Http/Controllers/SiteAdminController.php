<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Resources\UserResource;
use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;

class SiteAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index(Site $site)
    {
        $admins = $site->admins()->queryCondition()->with(['roles' => function ($query) use ($site) {
            $query->where('site_id', $site->id);
        }])->paginate();

        return UserResource::collection($admins);
    }

    public function show(Site $site, User $admin)
    {
        return $this->success(data: new UserResource($admin->load('roles')));
    }

    public function store(Site $site, StoreAdminRequest $request)
    {
        $site->admins()->syncWithoutDetaching([$request->user_id]);
        return $this->success();
    }

    public function destroy(Site $site, $admin)
    {
        $site->admins()->detach($admin);

        return $this->success('管理员删除成功');
    }

    //设置管理员角色
    public function syncAdminRole(Request $request, Site $site, User $admin)
    {
        $admin->syncRoles($request->roles);

        return $this->success('角色设置成功');
    }
}
