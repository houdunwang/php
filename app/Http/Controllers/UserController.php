<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;
use InvalidArgumentException;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index()
    {
        $users = User::when(request('type'), function ($query, $type) {
            $query->where($type, "like", "%" . request('content') . "%");
        })->paginate(request('row', 10));

        return UserResource::collection($users);
    }

    public function show(User $user)
    {
        return $this->success(data: new UserResource($user));
    }

    /**
     * 当前用户资料
     * @return array
     */
    public function currentUser()
    {
        $user = Auth::user()->makeVisible('mobile')->refresh();

        return $this->success(data: new UserResource($user));
    }

    /**
     * 设置角色
     * @param User $user
     * @param Role $role
     * @return array
     * @throws BindingResolutionException
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     * @throws InvalidArgumentException
     * @throws MassAssignmentException
     */
    public function role(User $user, Role $role)
    {
        $user->roles()->sync($role->id);
        return $this->success(data: $user->roles);
    }
}
