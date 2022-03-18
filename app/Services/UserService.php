<?php

namespace App\Services;

class UserService
{
    public function accountFieldName(string $value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    }
}
