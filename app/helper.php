<?php

use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * 当前访问用户
 *
 * @return User|null 用户模型
 */
function user(): ?User
{
    return Auth::check() ? Auth::user() : null;
}

/**
 * 缓存或获取当前请求站点
 *
 * @param Site $site 站点
 * @return Site|null
 */
function site(Site $site = null): ?Site
{
    static $cache = null;

    if ($site) $cache  = $cache;
    return $site;
}

//是否是超级管理员
function is_super_admin(): bool
{
    return user() ? user()->is_super_admin : false;
}

/**
 * 是否是站长
 *
 * @param Site $site 站点
 * @param User $user 用户
 * @return boolean
 */
function is_site_master(Site $site = null, User $user = null): bool
{
    $site = $site ?? config('site');
    $user = $user ?? user();

    return $user && $site ?  is_super_admin() || $site->user->id == $user->id : false;
}

/**
 * 权限判断
 *
 * @param string $name 权限标识
 * @param Site|null $site 站点
 * @param User|null $user 用户
 * @return boolean
 */
function access(string $name, Site $site = null, User $user = null): bool
{
    $site = $site ?? site();
    $user = $user ?? user();

    if (is_site_master($site, $user)) return true;

    return $site && $user ? $user->can($name) : false;
}
