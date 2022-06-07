<?php

namespace App\Http\Middleware;

use App\Models\Config;
use App\Models\System;
use Closure;
use Illuminate\Http\Request;

/**
 * 系统中间件
 * @package App\Http\Middleware
 */
class SystemMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $this->loadConfig();
        return $next($request);
    }

    protected function loadConfig()
    {
        //系统配置
        $database = System::first();
        $config = config('system');

        foreach ($config as $name => $value) {
            foreach ($value as $key => $item) {
                $config[$name][$key] = $database['data'][$name][$key] ?? $item;
            }
        }

        config(['system' => $config]);
    }
}
