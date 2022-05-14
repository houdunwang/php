<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * 当前用户
 * @return null|User
 */
function user(): ?User
{
    return Auth::check() ? Auth::user() : null;
}

/**
 * 是否为超级管理员
 * @return bool
 */
function is_super_admin(): bool
{
    return user() ? user()->is_super_admin : false;
}
