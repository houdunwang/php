<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Resources\UserResource;
use App\Models\Site;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index(Site $site)
    {
        $admins = $site->admins()->when(request('type'), function ($query, $type) {
            $query->where($type, request('content'));
        })->paginate();

        return UserResource::collection($admins);
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
