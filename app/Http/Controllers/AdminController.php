<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Resources\UserResource;
use App\Models\Site;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index(Site $site)
    {
        return UserResource::collection($site->admins()->paginate());
    }

    public function store(Site $site, StoreAdminRequest $request)
    {
        $site->admins()->syncWithoutDetaching([$request->user_id]);
        return $this->success();
    }

    public function show(Admin $admin)
    {
    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
    }

    public function destroy(Site $site, $admin)
    {
        $site->admins()->detach($admin);

        return $this->success();
    }
}
