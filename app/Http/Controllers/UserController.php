<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function role(User $user, Role $role)
    {
        $user->roles()->sync($role->id);
        return $user->roles;
    }
}
