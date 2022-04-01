<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function role(User $user, Role $role)
    {
        $user->roles()->sync($role->id);
        return $user->roles;
    }

    public function follower(User $user)
    {
        user()->followers()->toggle($user->id);
        return $user->followers;
    }

    public function fans(User $user)
    {
        return UserResource::collection($user->fans);
    }
}
