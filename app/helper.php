<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * 当前用户
 * @return null|User
 */
function user(): ?User
{
    return Auth::check() ? Auth::user() : null;
}
