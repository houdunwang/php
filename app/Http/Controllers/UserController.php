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

    public function info()
    {
        return $this->success(data: new UserResource(Auth::user()));
    }

    public function show()
    {
    }

    public function role(User $user, Role $role)
    {
        $user->roles()->sync($role->id);
        return $this->success(data: $user->roles);
    }
}
