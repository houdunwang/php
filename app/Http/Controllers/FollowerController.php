<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    /**
     * 当前用户关注或取关某个用户
     * @param User $user
     * @return array
     */
    public function toggle(User $user)
    {
        Auth::user()->followers()->toggle($user->id);
        return $this->success(data: ['isFollower' => Auth::user()->isFollower($user)]);
    }

    public function index(User $user)
    {
        return $this->success(data: UserResource::collection($user->followers));
    }
}
