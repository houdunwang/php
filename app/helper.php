<?php

use App\Models\Site;
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

/**
 * 是否为超级管理员
 * @return bool
 */
function is_super_admin(): bool
{
    return user() ? user()->is_super_admin : false;
}

// function site(Site $site = null): Site | null
// {
//     static $cache = null;
//     if ($site) $cache = $site;

//     return $cache;
// }

function is_site_master(Site $site): bool
{
    return true;
}
