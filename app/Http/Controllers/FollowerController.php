<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follower(User $user)
    {
        user()->followers()->toggle($user->id);
        return $user->followers;
    }
}
