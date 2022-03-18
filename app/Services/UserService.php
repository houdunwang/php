<?php

namespace App\Services;

use Illuminate\Contracts\Container\BindingResolutionException;

class UserService
{
    /**
     * 登录注册的字段名
     * @return string
     * @throws BindingResolutionException
     */
    public function fieldName()
    {
        return filter_var(request('account'), FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    }
}
